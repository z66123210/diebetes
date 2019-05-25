<h2>Create a page</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('pages/create') ?>
<label for="title">Title</label>
<input type="input" name="title" /><br />
<label for="UserId">UserId</label>
<input type="input" name="userid" /><br />
<label for="body">Body</label>
<Textarea name = 'body'></Textarea> <br />
<label for="image">Image</label>
<input type="input" name="image" /><br />
<input type="submit" name="submit" value="Create Page" />
</form>
