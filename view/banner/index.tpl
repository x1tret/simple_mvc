<h1>Banner Management</h1>
<br>
<table class="table">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>URL</th>
      <th>Start</th>
      <th>End</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($vdata['result'] as $i => $item) { ?>
    <tr>
      <td><?php echo $i+1; ?></td>
      <td><?php echo htmlspecialchars($item['banner_name']); ?></td>
      <td><?php echo htmlspecialchars($item['url']); ?></td>
      <td><?php echo date('Y-m-d H:i:s', $item['start_date']); ?></td>
      <td><?php echo date('Y-m-d H:i:s', $item['end_date']); ?></td>
      <td><a href="/banner/edit/<?php echo $i; ?>">Edit</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
