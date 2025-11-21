<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <title>Category Types – Inserimento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <style>
    /* solo un tocco per non fare schifo, niente UI pesante */
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background:#0b1020; color:#e5e7eb; }
    .wrap { max-width: 520px; margin: 56px auto; padding: 20px; }
  </style>
</head>
<body>
  <div class="page">
  <div class="card">
    <div class="card-header">
      <div>
        <div class="card-title">Nuovo tipo categoria</div>
        <div class="card-subtitle">Inserisci solo il nome. Tutto il resto è gestito da Laravel.</div>
      </div>
    </div>

    @if(session('ok'))
      <div class="mt-3" style="color:#bbf7d0;background:rgba(34,197,94,.12);border:1px solid rgba(34,197,94,.35);padding:10px 12px;border-radius:12px;">
        {{ session('ok') }}
      </div>
    @endif

    @if($errors->any())
      <div class="error mt-3">
        <ul style="margin:0; padding-left:18px;">
          @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
      </div>
    @endif

    <form method="post" action="{{ route('category_types.store') }}" class="form mt-4">
      @csrf
      <div class="field">
        <label class="label">Nome</label>
        <input class="input" type="text" name="name" maxlength="50" required placeholder="Es. Blog, Prodotto, Servizio…">
        <div class="help">Massimo 50 caratteri.</div>
      </div>

      <div class="btn-row mt-2">
        <button class="btn" type="submit">Salva</button>
        <a class="btn secondary" href="{{ url()->previous() }}">Annulla</a>
      </div>
    </form>
  </div>
</div>
2025!

</body>
</html>
