<?php
/**
 * @file
 * Provides view for content visibility.
 *
 * $public - Shows either public or private.
 * $title - name of the link
 * $accessors - user's who have access
 */
?>
<ul id="oa_visibility_toolbar">
  <li class="dropdown btn-group">
    <a class="dropdown-toggle btn <?php print $oa_toolbar_btn_class; ?>"
      id="visibility-dropdown" data-toggle="dropdown" href="#"
      title="<?php print $title; ?>">
      <?php if ($public): ?>
        <i class="icon-unlock"></i><span><?php print t('This content is Public');?></span>
      <?php else: ?>
        <i class="icon-lock"></i><span><?php print t('This content is Private');?></span>
      <?php endif; ?>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="visibility-dropdown">
      <li class="dropdown-column">
        <?php if ($public): ?>
          <div class="oa-visibility-public"><?php print $title; ?></div>
        <?php else: ?>
          <div class="oa-visibility-private">
            <i class="icon-lock"></i> <?php print $title; ?>
          </div>
          <?php if (!empty($accessors)): ?>
          <p><em><?php print t('Only the following can see this page'); ?></em></p>
          <?php foreach ($accessors as $class => $accessor): ?>
            <?php if (!empty($accessor['links'])): ?>
              <div class="oa-visibility-<?php print $class ?>">
                <div class='oa-visibility-header'>
                  <?php print $accessor['label']; ?>
                </div>
                <div class='oa-visibility-list'>
                  <?php print implode(', ', $accessor['links']); ?>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach ?>
          <?php endif; ?>
        <?php endif; ?>
      </li>
    </ul>
  </li>
</ul>
