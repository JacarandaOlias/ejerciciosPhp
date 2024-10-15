<?php 

function findClient($data, $id){
    foreach($data as $client){
        if ($client['id']== $id)
            return $client;
    }
    return null;
}

