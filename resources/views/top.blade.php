<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>テスト</title>
</head>
<body>
  <h1>このアプリのトップ</h1>

  <p>
    このアプリは、質問への回答からあなたの傾向を整理し、
    投資の考え方をサポートします。
  </p>

  @if ($errors->any())
    <div style="border:1px solid #f00; padding:12px; margin:12px 0;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('start.store') }}">
    @csrf

    <div style="margin-bottom:12px;">
      <label for="name">名前</label><br>
      <input id="name" name="name" type="text" value="{{ old('name') }}" required>
    </div>

    <button type="submit">診断開始</button>
  </form>
</body>
</html>
