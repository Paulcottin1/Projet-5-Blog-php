<?php
function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
    
    $posts = [];
    while($data = $req->fetch())
    {
        $post = new Post;
        $post->setId($data['id'])->setTitle($data['title'])->setContent($data['content']);
        $posts[] = $post;
    }
    
    return $posts;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    
    $data = $req->fetch();
    $post = new Post;
    $post->setId($data['id'])->setTitle($data['title'])->setContent($data['content']);
    
    
    
    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $req->execute(array($postId));

    
    $comments = [];
    while($data = $req->fetch())
    {
        $comment = new Comment;
        $comment->setId($data['id'])->setPostId($postId)->setAuthor($data['author'])->setComment($data['comment']);
        $comments[] = $comment;
    }

    return $comments;
}

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
