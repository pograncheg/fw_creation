<?php if (isset($this->component->result['multiple'])) : ?>
    <label><?= $this->component->result['title'] . ' '?></label><br>
    <?php foreach ($this->component->result['options'] as $option) : ?>
        <div class='mb-3'>
            <label><?= $option['title'] ?> <input <?=$this->component->result['str'] . $option['str']?> /></label><br>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <label><?= $this->component->result['title'] . ' '?>
        <input <?= $this->component->result['str'] ?> class=<?=$this->component->result['additional_class'] ?? ''?>>
    </label>
<?php endif ;?>