<?php
    include_once 'top.php';
    include_once 'menu.php';
?>
<div class="container py-4">
  <form id="contactForm">
    <div class="mb-3">
      <label class="form-label" for="name">Name</label>
      <input class="form-control" id="name" type="text" placeholder="Name" />
    </div>
    <div class="mb-3">
      <label class="form-label" for="emailAddress">Email Address</label>
      <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" />
    </div>
    <div class="mb-3">
      <label class="form-label" for="message">Message</label>
      <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea>
    </div>
    <div class="d-grid">
      <button class="btn btn-secondary btn-lg" type="submit">Submit</button>
    </div>
  </form>
</div>
  <?php
    include_once 'buttom.php';
  ?>