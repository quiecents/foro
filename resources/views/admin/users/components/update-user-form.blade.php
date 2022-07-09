<form method="POST" action="{{ route('admin.users.update', [$user]) }}">
    @method('PATCH')
    @csrf
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="name">Name:</label>
        <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" id="name" value="{{ old('name') ?? $user->name }}" required>
        @error('name')
            <div id="validationServer01Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror" name="email" id="email" value="{{ old('email') ?? $user->email }}" required>
        @error('email')
            <div id="validationServer02Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="email-verified-at">Email Verified At:</label>
        <input type="date" class="form-control @error('email-verified-at') {{ 'is-invalid' }} @enderror" id="email_verified_at" name="email_verified_at" value="{{ old('email_verified_at') ?? $user->email_verified_at->format('Y-m-d') }}">
        @error('email-verified-at')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control @error('password') {{ 'is-invalid' }} @enderror" aria-describedby="passwordHelpBlock">
        <small id="passwordHelpBlock" class="form-text text-muted">
          Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </small>
      </div>
      <div class="col-md-6 mb-3">
        <label for="password">Repeat Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') {{ 'is-invalid' }} @enderror">
        @error('password')
            <div id="validationServer04Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="chklegal" id="chklegal" aria-describedby="invalidCheck3Feedback" required>
        <label class="form-check-label" for="chklegal">
          Agree to terms and conditions
        </label>
        @error('chklegal')
            <div  id="validationServer05Feedback" class="invalid-feedback">
                You must agree before submitting.
            </div>
        @enderror
      </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
  </form>