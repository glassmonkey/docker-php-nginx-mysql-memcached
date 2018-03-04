<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


$app->get('/list', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/list' route");
    # サンプルなのでsql直かきこ
    $sql = "select * from hoges";
    $stmt = $this->db->query($sql);
    $results = [];
    while($row = $stmt->fetch()) {
         $results[] = $row;
    }
    return $this->renderer->render($response, "list.phtml", ["list" => $results]);
});

$app->post('/commit', function ($request, $response, $args){
    $params = $request->getQueryParams();
    $errors = array();
    if ($params['id'] === '') {
        $errors['id'] = 'タイトルが空です';
    }
    if (count($errors) > 0) {
        $response()->withStatus(302)->withHeader('Location', '/list');
    } else {
        // エラーがなかった時の処理をここに書く
        $stmt = $this->db->prepare("INSERT INTO hoges (hoge_id, created_at) VALUES (:id, :date)");
        $stmt->bindValue(':id', $params['id'], PDO::PARAM_INT);
        $stmt->bindValue(':date', date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $stmt->execute();
        return $response->withStatus(302)->withHeader('Location', '/list');
    }
});
