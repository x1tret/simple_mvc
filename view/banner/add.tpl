<h1>Add a new banner</h1>

<form method="POST" class="needs-validation">
  <div class="form-group required row">
    <label for="banner_name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="banner_name" placeholder="banner name" required />
    </div>
  </div>
  <div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="url" placeholder="URL" required />
    </div>
  </div>
  <div class="form-group row">
    <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="start_date" placeholder="YYYY-MM-dd HH:mm:ss" required />
    </div>
  </div>
  <div class="form-group row">
    <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="end_date" placeholder="YYYY-MM-dd HH:mm:ss" required />
    </div>
  </div>
  <div class="form-group row">
    <label for="end_date" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-primary mb-2">Save</button>
    </div>
  </div>
</form>