<label><?= $this->component->result['title'] . ' '?></label><br>
<?php foreach ($this->component->result['options'] as $option) : ?>
    <label><input <?=$this->component->result['str'] . $option['str']?>/><?= $option['title'] ?></label><br>
<?php endforeach; ?>