<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\CourseContent;
use App\Course;

class LectureUpload extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data,$course;
    public function __construct(CourseContent $data)
    {
        $this->data=$data;
        $this->course=Course::where('course_id',$data->course_content_course_id)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@itclanbd.com')->subject('New Content')
                                                ->view('Mail.lecturemail')
                                                ->with('data',$this->data)
                                                ->with('course',$this->course);
    }
}
