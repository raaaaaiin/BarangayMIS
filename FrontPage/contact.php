<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <link rel="stylesheet" href="css/contact.css">
</head>
<body  style="background-color:#f9f9f9 !important">
  <div class="contact-form-container">
    <h1>Contact Us</h1>
    <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7720.670568341254!2d121.1413698291694!3d14.63689930803529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b9f9cce6c589%3A0xd3e10dc7e042f517!2sSitio%20Igiban!5e0!3m2!1sen!2sph!4v1685137113985!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <form class="contact-form">
      <input type="text" id="name" name="name" placeholder="Your Name" required>
      <input type="email" id="email" name="email" placeholder="Your Email" required>
      <textarea id="message" name="message" placeholder="Your Message" required></textarea>
      <button type="submit">Send Message</button>
    </form>
   
  </div>
</body>
</html>
