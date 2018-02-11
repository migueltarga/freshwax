<?php

namespace freshwax\Jobs;
use freshwax\Models\Track;

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

		$file_name = $this->track->file_name;

		Log::channel('spaces')->info('preparing to process file: ' . $file_name);

		$file = Storage::get('tracks_to_upload/' . $file_name);

		//if it's not an mp3 it needs to be
		if(strcasecmp($this->track->ext,"mp3") != 0){

			Log::channel('spaces')->info('mp3 conversion necessary: ' . $file_name);

			$track_full_path = storage_path('tracks_to_upload');
			$original_file_full_path = $track_full_path . $file_name;
			$mp3_file_full_path = $track_full_path . $track_name . '.mp3';

			Log::channel('spaces')->info('converting with sox: ' . $file_name);

			$convert_command = 'sox ' . $original_file_full_path . ' ' . $mp3_file_full_path;
			$output = [];
			exec($convert_command, $output);

			Log::channel('spaces')->info('uploading to spaces... ' . $file_name);

			Storage::disk('spaces')->putFileAs('tracks', new File($mp3_file_full_path), $track_name . '.mp3');

			Log::channel('spaces')->info('upload complete: ' . $file_name);
		}

		Log::channel('spaces')->info('uploading original file' . $file_name);

		Storage::disk('spaces')->putFileAs('tracks', $file, $this->track->file_name);

		Log::channel('spaces')->info('upload complete... ' . $file_name);

    }
}
