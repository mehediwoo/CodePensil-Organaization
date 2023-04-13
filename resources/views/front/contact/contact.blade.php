<!-- contact-area -->
<div class="contact-area">
    <div class="container">
        <form action="{{ route('message') }}" method="POST" class="contact__form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" placeholder="Enter your name*" value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" placeholder="Enter your mail*" value="{{ old('email') }}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="subject" placeholder="Enter your subject*" value="{{ old('subject') }}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" placeholder="Your Phone Number*" value="{{ old('phone') }}">
                </div>
            </div>
            <textarea name="message" id="message" placeholder="Enter your massage*">{{ old('message') }}</textarea>
            <button type="submit" class="btn">send massage</button>
        </form>
    </div>
</div>
<!-- contact-area-end -->
