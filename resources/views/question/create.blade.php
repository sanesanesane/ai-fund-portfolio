<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>質問回答</title>
</head>
<body>
  <h1>質問回答</h1>

  @if ($errors->any())
    <div style="color:red;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('question.store') }}">
    @csrf

    @foreach ($questions as $q)
      <fieldset style="margin-bottom: 20px;">
        <legend>{{ $q->text ?? $q->question_text ?? '質問' }}</legend>

        @foreach ($q->choices ?? [] as $c)
          <label style="display:block; margin:6px 0;">
            <input
              type="radio"
              name="answers[{{ $q->id }}]"
              value="{{ $c->id }}"
              {{ old("answers.$q->id") == $c->id ? 'checked' : '' }}
            >
            {{ $c->label ?? $c->text ?? '選択肢' }}
          </label>
        @endforeach
      </fieldset>
    @endforeach

    <button type="submit">送信</button>
  </form>
</body>
</html>