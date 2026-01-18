<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Intake 入力</title>
</head>
<body>
  <h1>Intake 入力</h1>
  <p>年齢・投資したい額・投資経験を入力してください。</p>

  {{-- バリデーションエラー表示 --}}
  @if ($errors->any())
    <div style="border:1px solid #f00; padding:12px; margin:12px 0;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('intake.store') }}">
    @csrf

    <div style="margin-bottom:12px;">
      <label for="age">年齢</label><br>
      <input
        id="age"
        name="age"
        type="number"
        min="0"
        value="{{ old('age') }}"
        required
      >
    </div>

    <div style="margin-bottom:12px;">
      <label for="budget">投資したい額（円）</label><br>
      <input
        id="budget"
        name="budget"
        type="number"
        min="0"
        value="{{ old('budget') }}"
        required
      >
    </div>

    <fieldset style="margin-bottom:12px;">
      <legend>投資経験</legend>

      <label style="display:block; margin:6px 0;">
        <input
          type="radio"
          name="experience"
          value="0"
          {{ old('experience', '0') === '0' ? 'checked' : '' }}
          required
        >
        投資経験なし
      </label>

      <label style="display:block; margin:6px 0;">
        <input
          type="radio"
          name="experience"
          value="1"
          {{ old('experience') === '1' ? 'checked' : '' }}
        >
        投資経験0から5年
      </label>

      <label style="display:block; margin:6px 0;">
        <input
          type="radio"
          name="experience"
          value="2"
          {{ old('experience') === '2' ? 'checked' : '' }}
        >
        投資経験5年以上
      </label>
    </fieldset>

    <button type="submit">登録（テスト送信）</button>
  </form>

  <p style="margin-top:20px;">
    <a href="{{ url('/') }}">トップへ戻る</a>
  </p>
</body>
</html>
