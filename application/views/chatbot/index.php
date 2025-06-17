<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartNes Assistant - Buku Tamu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
  body {
    background-color: #f4f6f9;
    font-family: 'poppins', sans-serif;
    color: #333;
  }

  .glass-container {
    background-color: white;
    border-radius: 15px;
    padding: 25px;
    margin-top: 80px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
  }

  h2 {
    font-weight: 600;
    color: #2c3e50;
  }

  .chat-container {
    max-height: 400px;
    overflow-y: auto;
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #e1e4e8;
    border-radius: 10px;
    background-color: #f9fafb;
  }

  .user-bubble, .bot-bubble {
    padding: 10px 15px;
    border-radius: 10px;
    margin: 6px 0;
    max-width: 75%;
    word-wrap: break-word;
    font-size: 14px;
    line-height: 1.4;
  }

  .user-bubble {
    background-color: #e0f7fa;
    color: #000;
    margin-left: auto;
    text-align: right;
  }

  .bot-bubble {
    background-color: #edf2f7;
    color: #333;
    margin-right: auto;
    text-align: left;
  }

  .chat-input {
    border: 1px solid #ced4da;
    border-radius: 20px;
    padding: 10px 20px;
    width: 100%;
    outline: none;
    font-size: 14px;
  }

  .btn-send {
    border-radius: 20px;
    background-color: #0d6efd;
    color: white;
    border: none;
    padding: 10px 20px;
    transition: background-color 0.3s ease;
  }

  .btn-send:hover {
    background-color: #084298;
  }
</style>

</head>
<body>
  <div class="container">
    <div class="glass-container shadow-lg">
      <h2 class="text-center mb-4">NESAS Assistant</h2>
      <div class="chat-container" id="chatContainer">
        <!-- <div class="bot-bubble">Hallo Netines, apa yang bisa saya bantu di sini?</div> -->
      </div>
      <div class="d-flex">
        <input type="text" id="chatInput" class="chat-input me-2" placeholder="Tanyakan sesuatu...">
        <button class="btn btn-warning btn-send" onclick="sendMessage()">Kirim</button>
      </div>
    </div>
  </div>

  <script>
    function sendMessage() {
      const input = document.getElementById("chatInput");
      const message = input.value.trim();
      if (message === "") return;

      // Tampilkan pesan pengguna
      addChatBubble(message, true);
      input.value = "";

      // Kirim ke controller
      fetch("<?= base_url('chatbotController/ask') ?>", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "chatInput=" + encodeURIComponent(message)
      })
      .then(res => res.text())
      .then(response => {
        // Tampilkan jawaban dari controller/database
        addChatBubble(response, false);
      })
      .catch(err => {
        addChatBubble("Maaf, terjadi kesalahan koneksi.", false);
      });
    }

    function addChatBubble(message, isUser = true) {
      const chatContainer = document.getElementById("chatContainer");
      const bubble = document.createElement("div");
      bubble.className = isUser ? "user-bubble" : "bot-bubble";
      bubble.textContent = message;
      chatContainer.appendChild(bubble);
      chatContainer.scrollTop = chatContainer.scrollHeight;
    }
  </script>
</body>
</html>
