<section class="roomplan">
  <div class="rooms-title__wrap">
    <h2 class="room-plan">間取り</h2>
  </div>
  <div class="room-plan__unit">
    <span>
      <?php
      $room_title = get_post_meta(get_the_ID(), 'room_title', true);
      echo !empty($room_title) ? esc_html($room_title) : '情報がありません';
      ?>
    </span>
    <p><?php
    $room_area = get_post_meta(get_the_ID(), 'room_area', true);
    echo !empty($room_area) ? esc_html($room_area) : '情報がありません'; ?></p>
  </div>
  <?php
  $room_image_id = get_post_meta(get_the_ID(), 'room_image', true);
  if (!empty($room_image_id)) {
    $room_image_url = wp_get_attachment_url($room_image_id);
    echo '<img class="room-plan__image" src="' . esc_url($room_image_url) . '" alt="間取り図">';
  } else {
    echo '<p>間取り図の情報がありません</p>';
  }
  ?>
</section>