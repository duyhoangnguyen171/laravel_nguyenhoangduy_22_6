<div class="full-screen-container">
  <div class="banner">
    <div class="video-container text-center">
      <video id="introVideo" width="100%" height="70%" controls autoplay>
        <source src="{{ asset('img/banners/introoffical.mp4') }}" type="video/mp4">
        Trình duyệt của bạn không hỗ trợ thẻ video.
      </video>
    </div>

    

    <script>
      function rewindVideo() {
        const video = document.getElementById('introVideo');
        video.currentTime -= 10; // quay lại 10 giây
      }

      function forwardVideo() {
        const video = document.getElementById('introVideo');
        video.currentTime += 10; // tiến tới 10 giây
      }

      // Đảm bảo video tự động phát khi trang tải
      document.addEventListener("DOMContentLoaded", function() {
        const video = document.getElementById('introVideo');
        video.play();
      });
    </script>
  </div>
</div>