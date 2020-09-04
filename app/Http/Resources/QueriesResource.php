<?php

    namespace App\Http\Resources;
    use App\Http\Resources\CoursesResource;
    use Illuminate\Http\Resources\Json\JsonResource;

    class QueriesResource extends JsonResource
    {
        /**
         * Transform the resource into an array.
         *
         * @param  \Illuminate\Http\Request $request
         * @return array
         */
        public function toArray($request) {
            return [
                'id' => $this->id,
                'q_address' => $this->q_address,
                'q_contact' => $this->q_contact,
                'q_dealt_by' => $this->q_dealt_by,
                'q_email' => $this->q_email,
                'q_name' => $this->q_name,
                'q_preferred_timings' => $this->q_preferred_timings,
                'q_session_type' => $this->q_session_type,
                'updated_at' => $this->updated_at,
                'courses' => CoursesResource::collection($this->courses),
                'created_at' => $this->created_at,
                ];
        }
    }
