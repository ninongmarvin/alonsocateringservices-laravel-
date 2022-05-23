@extends('base')
@section('content')
<div class="contact" style="background-image: url('images/contact.jpg')">
  <div class="contact-container">
    <form class="contact-form" action="https://formspree.io/f/mrgjajdz" method="POST">
      <h1>Contact Us</h1>
      <label>Full Name</label>
      <input name="name" type="text" placeholder="Enter Full Name..."/>
      <label>Email</label>
      <input name="email" type="email" placeholder="Enter Email..."/>
      <label>Occation/Event</label>
      <input name="event" type="text" placeholder="Occation or event..."/>
      <label>Message</label>
      <textarea rows="6" placeholder="Enter Message" name="message" required></textarea>
      <button type="submit" name="submit">Send Message</button>
    </form>
  </div>
</div>
@endsection
