<div class="users index">
    <h2><?php echo __('Match Result'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
            <th><?php echo 'AgentId'; ?></th>
            <th><?php echo 'Contact Name'; ?></th>
            <th><?php echo 'Contact Zip Code'; ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($matches as $match): ?>
    <tr>
        <td><?php echo h($match['AgentCode']); ?>&nbsp;</td>
        <td><?php echo h($match['ContactName']); ?>&nbsp;</td>
        <td><?php echo h($match['ContactZipcode']); ?>&nbsp;</td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>
