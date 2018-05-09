<div id="comment-<?= $comment->id ?>">
  <p>
    <b><?= $comment->auteur ?></b>
    <span class="text-muted">le <?= $comment->date ?></span>
  </p>
  <div class="blockquote">
    <blockquote>
      <?= htmlentities($comment->contenu) ?>
    </blockquote>
  </div>
  <div class="formulaire">
    <form class="form-group"  method="post">
      <p class="text-left">
        <input type="hidden" name="valeur" value="<?= $comment->id_article ?>">
        <input type="hidden" name="idval" value="<?= $comment->id ?>">
        <?php if($comment->depth <= 1): ?>
          <button  type="button" class="reply btn btn-default" data-id="<?= $comment->id ?>"><span class="glyphicon glyphicon-share-alt"></span></button>
        <?php endif; ?>
        <button type="submit" name="signal" class="btn btn-default"><span class="glyphicon glyphicon-warning-sign"></span></button>
      </p>
    </form>
  </div>
</div>

<div style="margin-left: 50px;">
    <?php if(isset($comment->children)): ?>
        <?php foreach($comment->children as $comment): ?>
            <?php require('comments.php'); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
