<?php

    function getPosts()
    {
        $db=dbConnect();
        $req = $db->query('SELECT id,titre,contenu, DATE_FORMAT( date_creation ,\'%d/%m/%Y à %Hh%imin%ss\') as 
        date_creation_fr FROM billets ORDER BY date_creation_fr DESC LIMIT 0,5');
        return $req;
    }

    function getPost($post_id)
    {
        
        $db=dbConnect();
        $req = $db->prepare('SELECT id,titre,contenu, DATE_FORMAT(date_creation,\'%d/%m/%Y à %Hh%imin%ss\') as
         date_creation_fr FROM billets WHERE id=? ');
        $req->execute(array($post_id));
        $post = $req->fetch();
        return $post;

    }

    function getComments($post_id)
    {
        $db=dbConnect();
        $comments = $db->prepare('SELECT id, author,comment,DATE_FORMAT(comment_date,\'%d/%m/%Y à %Hh%imin%ss\') as
        comment_date_fr FROM comments  WHERE post_id=? ORDER BY comment_date DESC');
        $comments->execute(array($post_id));
        
        return $comments ;
    }

    function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=poo_test_php;charset=utf8','root','');
            return $db;
        } catch (Exception $e) {
            die ('error'.$e->getMessage());
        }
    }
?>
