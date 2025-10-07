<?php component("header") ?>
    <!-- Rating Section -->
    <section class="py-16">
      <div class="container mx-auto px-4 flex justify-center">
        <form method="POST" class="bg-white rounded-xl shadow-lg p-10 w-full max-w-2xl text-center">
          <h1 class="text-3xl font-bold kfu-text mb-6">قيّم الفعالية</h1>
          <p class="text-gray-600 mb-8">ساعدنا على تحسين فعالياتنا من خلال رأيك</p>

          <input type="hidden" name="rating" id="ratingBox">
          <!-- Stars -->
          <div id="stars" class="flex justify-center mb-8 text-4xl text-gray-300">
            <span class="star" data-value="1">★</span>
            <span class="star" data-value="2">★</span>
            <span class="star" data-value="3">★</span>
            <span class="star" data-value="4">★</span>
            <span class="star" data-value="5">★</span>
          </div>

          <!-- Comment Box -->
          <textarea
            id="comment"
            rows="4"
            name="feedback_text"
            placeholder="اكتب تعليقك هنا..."
            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-600 focus:outline-none mb-6"
          ></textarea>

          <!-- Submit Button -->
          <button
            onclick="submitRating()"
            class="bg-green-700 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-800 transition"
          >
            إرسال التقييم
          </button>

          <!-- Message -->
          <p id="message" class="mt-6 text-green-600 font-semibold hidden">
            ✅ تم إرسال تقييمك بنجاح
          </p>
        </form>
      </div>
    </section>

    <script>
      let selectedRating = 0;
      const stars = document.querySelectorAll(".star");

      stars.forEach((star, index) => {
        star.addEventListener("click", () => {
          selectedRating = index + 1;
          stars.forEach((s, i) => {
            s.style.color = i < selectedRating ? "#facc15" : "#d1d5db"; // أصفر / رمادي
          });

          ratingBox.value = selectedRating;
        });
      });

      function submitRating() {
        const comment = document.getElementById("comment").value;
        if (selectedRating === 0) {
          alert("الرجاء اختيار عدد النجوم للتقييم");
          return;
        }
        console.log("Rating:", selectedRating, "Comment:", comment);
        document.getElementById("message").classList.remove("hidden");
      }
    </script>
<?php component("footer") ?>
