<?php
namespace App\Controller;
use App\Bdd\Bdd;

class productComment
{
    public function __construct()
    {
        $this->bdd = new Bdd();
        $this->bdd = $this->bdd->connect();
    }
    
    // getCommentByProductId
    public function getComments($productId)
    {
        $req = $this->bdd->prepare('SELECT *, Product_comment.id as commentId FROM Product_comment JOIN User ON User.id=Product_comment.User_id WHERE Product_comment.Product_id = ? ORDER BY commentId DESC');
        $req->execute([$productId]);
        $comment = $req->fetchAll();
        return $comment;
    }
    
    // addComment && flushComment
    public function addComment($comment, $rating, $productId, $userId, $date)
    {
        $req = $this->bdd->prepare('INSERT INTO Product_comment(comment, rating, Product_id, User_id, created_at) VALUES(?, ?, ?, ?, ?)');
        $req->execute([$comment, $rating, $productId, $userId, $date]);
    }
    
    // getMoyenne && getMoyenneByProductId
    public function getMoyenne($productId)
    {
        $req = $this->bdd->prepare('SELECT AVG(rating) AS moyenne FROM Product_comment WHERE Product_id = ?');
        $req->execute([$productId]);
        $moyenne = $req->fetch();
        return $moyenne;
    }
    
    // deleteComment
    public function deleteComment($productId, $userId)
    {
        $req = $this->bdd->prepare('DELETE FROM Product_comment WHERE Product_id = ? AND User_id = ?');
        $req->execute([$productId, $userId]);
    }
}