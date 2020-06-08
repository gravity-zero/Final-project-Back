<?php

function sql_to_json($success, $results=NULL)
{
  $results["total_result"] = count($results);
  $response["results"]["species"] = $results;
  echo json_encode($response);
}