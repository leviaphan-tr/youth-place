<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Post Form</title>
  <style>
    body {
      background: #111;
      font-family: 'Helvetica Neue', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .post-form {
      background-color: #4B0082;
      color: white;
      border-radius: 20px;
      padding: 20px;
      display: flex;
      max-width: 800px;
      width: 100%;
      gap: 20px;
    }

    .image-preview {
      width: 200px;
      height: 200px;
      background-color: #ccc;
      border-radius: 4px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #666;
      font-size: 14px;
      text-align: center;
    }

    .form-fields {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .form-fields input[type="text"],
    .form-fields input[type="date"],
    .form-fields textarea {
      background: transparent;
      border: none;
      border-bottom: 1px solid white;
      color: white;
      margin-bottom: 10px;
      padding: 5px;
      font-size: 16px;
    }

    .form-fields textarea {
      resize: none;
      height: 80px;
    }

    .bottom-row {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      opacity: 0.8;
    }

    .form-fields input[type="file"] {
      margin-top: 10px;
      color: white;
    }

    ::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }
  </style>
</head>
<body>

  <form class="post-form" method="post" action="{{route('event.store') }}" enctype="multipart/form-data">
    @csrf()
    <!-- Изображение -->
    <div class="image-preview">
      Image Preview
    </div>

    <!-- Поля формы -->
    <div class="form-fields">
      <input type="text" placeholder="Title" name="title">
      <input type="text" placeholder="Format" name="format">
    <input type="text" placeholder="Tags" name="tags">
      <input type="number" placeholder="Age minimum" name="age_minimum">
      <input type="number" placeholder="Age maximum" name="age_maximum">
      <textarea placeholder="Write your post..." name="content"></textarea>

      <div class="bottom-row">
        <input type="date" name="date">
        <input type="text" placeholder="Location" name="location">
      </div>
      

      <input type="file" name="image">
      <button type="submit">submit</button>
    </div>
  </form>

</body>
</html>
