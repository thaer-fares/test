<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }



    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViewer $event)
    {
        //
      //  $this->updateViewr($event->video);
        if (!session()->has('videoIsVisited')) {
            $this->updateViewr($event->video);
        } else {
            return false;
        }
    }

    function updateViewr($video)
    {
        $video->viewer = $video->viewer + 1;
        $video->save();
        session()->put('videoIsVisited', $video->id);


    }
}
