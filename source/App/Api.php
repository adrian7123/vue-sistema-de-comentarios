<?php

namespace Source\App;

use Source\Models\Comments;

class Api
{
    function toJson($comments): string
    {
        $comments_array = array();

        if(isset($comments)){
            foreach ($comments as $com) {
                $comments_array[] = [
                    "id" => $com->id,
                    "name" => $com->name,
                    "comment" => $com->comment,
                ];
            }
    
        }
        return json_encode($comments_array);
        
    }

    public function getAllComments()
    {
        $comments = (new Comments)->find()->fetch(true);
        $commentsJson = $this->toJson($comments);

        echo $commentsJson;
    }

    public function addComment($d)
    {
        $com = new Comments;

        $com->name = $d['name'];
        $com->comment = $d['comment'];
        $com->save();

        echo json_encode($com->save());

    }

    public function destroy($d)
    {
        $comment = (new Comments)->findById($d['id']);

        $comment->destroy();

        echo json_encode($comment->destroy());
    }
}
