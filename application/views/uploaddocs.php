
<form action="uploaddocs/index" method="post"
enctype="multipart/form-data" name="uploadform" id="uploadform">
<!-- <label for="file">Title:</label>
<input type="text" id="name" name="name" />
<br />
<br />
<br /> -->
<label for="file">Filename:</label>
<input type="file" name="upload-file" id="upload-file" />
<br />
<br />
<br />
<label for="file">Category:</label>
<select name="category" id="category">

    <option value="1">cat-1</option>

    <option value="2">cat-2</option>

    <option value="3">cat-3</option>

    <option value="4">cat-4</option>

    <option value="0">cat-5</option>

</select>

<label for="file">Doc type:</label>

<select name="doctype" id="doctype">

    <option value="private">private</option>

    <option value="public">public</option>

</select>
<input type="submit" name="submit" value="Submit"/>
</form>
