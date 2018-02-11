<?php

namespace freshwax\Jobs;
use freshwax\Models\Track;

use Illuminate\Http\File;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Storage;
use Log;

class ProcessTrackUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	protected $track;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Track $track)
    {
		$this->track = $track;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

		$file_name = $this->track->file_name . $this->track->ext;
		$this->track_full_path = storage_path('app/tracks_to_upload') . '/';
		$original_file_full_path = $this->track_full_path . $file_name;

		Log::channel('spaces')->info('preparing to process file: ' . $file_name);

		try {
			$file = new File($original_file_full_path);

			//if it's not an mp3 it needs to be
			if(strcasecmp($this->track->ext,"mp3") != 0){

				Log::channel('spaces')->info('mp3 conversion necessary: ' . $file_name);

				$mp3_file_name = $this->track->file_name . '.mp3';
				$mp3_file_full_path = $this->track_full_path . $mp3_file_name;

				Log::channel('spaces')->info('converting with sox: ' . $file_name);

				$convert_command = 'sox ' . $original_file_full_path . ' ' . $mp3_file_full_path;
				$output = [];
				exec($convert_command, $output);

				Log::channel('spaces')->info('uploading to spaces... ' . $file_name);

				$mp3_file = new File($mp3_file_full_path);
				Storage::disk('spaces')->putFileAs('tracks', $mp3_file, $mp3_file_name);
				Storage::delete($mp3_file);
				$this->track->path = 'tracks/' . $mp3_file_name;

				Log::channel('spaces')->info('upload complete: ' . $file_name);

				$this->track->ext = '.mp3';
			} else {
				$this->track->path = 'tracks/' . $file_name;
			}

			Log::channel('spaces')->info('uploading original file' . $file_name);

			Storage::disk('spaces')->putFileAs('tracks', $file, $file_name);
			Storage::delete('app/tracks_to_upload' . $file_name);

			Log::channel('spaces')->info('upload complete... ' . $file_name);

			$this->track->uploaded = true;
			$this->track->save();

		} catch (Exception $e) {
			Log::channel('spaces')->error("Can't locate file because: " & $e->getMessage());

			$this->track->file_name = null;
			$this->track->path = null;
			$this->track->ext = null;
			$this->track->original_ext = null;
			$this->track->uploaded = false;
			$this->track->save();
			//throw($e);
		}
	}
}
