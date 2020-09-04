<?php

    namespace App\Http\Controllers;

    use App\Admissions;
    use App\Message;
    use Illuminate\Http\Request;

    class MessageController extends Controller {

        public function single(Request $request)
        {
            $student   = $request->input('student');
            $message   = $request->input('message');
            $admission = Admissions::findOrFail($student['id']);

            $params   = [
                'to'      => $admission->a_mobile,
                'from'    => 'ACE',
                'message' => $message,
                'unicode' => false,
                'date'    => null,
                'time'    => null
            ];
            $response = (new \Lifetimesms\Gateway\Lifetimesms)->singleSMS($params);

            $msg                   = new Message;
            $msg->m_mobile         = str_replace('-', '', $admission->a_mobile) ;
            $msg->m_text           = $message;
            $msg->messageable_type = 'App\Admissions';
            $msg->messageable_id   = $admission->id;
            $msg->m_status         = $response['status'];
            $msg->m_message_id     = $response['message_id'];

            $msg->save();
        }
    }
