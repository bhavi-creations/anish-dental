<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anish Dental Multispeciality Dental Hospital Chatbot</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Chatbot Icon Styling */
        #chatbot-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            cursor: pointer;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #efa543;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s;
        }

        #chatbot-icon:hover {
            transform: scale(1.05);
        }

        /* Chat Window Styling */
        #chatbot-window {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            height: 450px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid #efa543;
        }

        /* Chat Header */
        #chat-header {
            background-color: #efa543;
            color: white;
            padding: 10px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Chat Body */
        #chat-body {
            flex-grow: 1;
            padding: 15px;
            overflow-y: auto;
            background-color: #ffffff;
        }

        /* Message Styling */
        .user-msg {
            text-align: right;
        }

        .bot-msg {
            text-align: left;
        }

        .message-bubble {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 15px;
            margin-bottom: 8px;
            max-width: 90%;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .bot-bubble {
            background-color: #eeeeee;
            border: 1px solid #cccccc;
            color: #333;
        }

        .user-msg .message-bubble {
            background-color: #003b32;
            color: white;
        }

        /* Service Buttons */
        .service-btn {
            width: 100%;
            margin-bottom: 8px;
            background-color: #003b32 !important;
            border: 2px solid #003b32;
            color: white;
            font-size: 0.9rem;
            white-space: normal;
            height: auto;
            min-height: 40px;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
        }

        .service-btn:hover {
            background-color: #efa543;
            border-color: #efa543;
        }

        .restart-btn {
            background-color: #efa543;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.85rem;
        }

        .restart-btn:hover {
            background-color: #555555;
        }

        .bot-bubble a {
            color: #000000 !important;
            text-decoration: underline !important;
        }
    </style>
</head>

<body>

    <div id="chatbot-icon" onclick="toggleChatbot()">
        <i class="fas fa-tooth fa-2x"></i>
    </div>

    <div id="chatbot-window">
        <div id="chat-header">
            <span>Anish Dental Multispeciality Dental</span>
            <button type="button" style="background:none; border:none; color:white; font-size:1.2rem; cursor:pointer;" onclick="toggleChatbot()">✕</button>
        </div>
        <div id="chat-body"></div>
    </div>

    <script>
        const chatBody = document.getElementById('chat-body');
        const chatbotWindow = document.getElementById('chatbot-window');

        // Hospital Contact Information
        const contactNumber = '+91 73962 56474';
        const hospitalName = 'Anish Dental Multispeciality Dental Hospital';

        // Updated Service Data
        const services = {
            'DentalImplants': {
                name: 'Dental Implants',
                content: 'Dental Implants are permanent, natural-looking replacements for missing tooth roots, providing a strong foundation for fixed or removable replacement teeth.',
            },
            'Aligners': {
                name: 'Aligners',
                content: 'Clear Aligners are a comfortable, nearly invisible alternative to traditional braces that gradually straighten your teeth without metal wires or brackets.',
            },
            'DentalVeneers': {
                name: 'Dental Veneers',
                content: 'Dental Veneers are custom-made, wafer-thin shells designed to cover the front surface of teeth to instantly improve your smile\'s shape, color, and alignment.',
            },
            'RootCanal': {
                name: 'Root Canal Treatment',
                content: 'Root Canal Treatment (RCT) saves severely decayed or infected teeth by removing the damaged pulp, cleaning the root canal, and sealing it safely.',
            },
            'DentalBridge': {
                name: 'Dental Bridge',
                content: 'A Dental Bridge bridges the gap created by one or more missing teeth using custom-crafted artificial teeth anchored by adjacent natural teeth or implants.',
            },
            'PediatricDentistry': {
                name: 'Pediatric Dentistry',
                content: 'Pediatric Dentistry provides specialized, friendly, and comprehensive oral healthcare tailored specifically for infants, children, and teenagers.',
            },
            'PeriodontalCare': {
                name: 'Periodontal Care',
                content: 'Periodontal Care focuses on preventing, diagnosing, and treating gum diseases to keep your gums healthy and support long-term tooth stability.',
            },
            'OralSurgery': {
                name: 'Oral Surgery',
                content: 'Oral Surgery includes specialized procedures like corrective jaw surgery, complex extractions, and treatment of facial injuries performed with maximum precision.',
            },
            'TeethWhitening': {
                name: 'Teeth Whitening',
                content: 'Professional Teeth Whitening safely brightens discolored or stained teeth, giving you a fresh, radiant, and brilliant smile in just one visit.',
            },
            'Dentures': {
                name: 'Dentures',
                content: 'Custom full or partial dentures and advanced prosthetics restore functional chewing and natural appearance for patients missing multiple teeth.',
            },
            'GeneralDentistry': {
                name: 'General Dentistry',
                content: 'Comprehensive dental care including routine check-ups, tooth restorations, preventative cleanings, and overall oral health maintenance.',
            },
            'WisdomTeeth': {
                name: 'Wisdom Teeth Removal',
                content: 'Safe and virtually painless extraction of impacted or painful wisdom teeth to prevent crowding, infection, and damage to surrounding teeth.',
            }
        };

        // Toggle Chatbot Open/Close
        function toggleChatbot() {
            if (chatbotWindow.style.display === 'flex') {
                chatbotWindow.style.display = 'none';
            } else {
                chatbotWindow.style.display = 'flex';
                displayWelcomeMessage();
            }
        }

        // Append Message to Chat Body
        function appendMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add(`${sender}-msg`);

            const bubble = document.createElement('span');
            bubble.classList.add('message-bubble');
            if (sender === 'bot') {
                bubble.classList.add('bot-bubble');
            }

            bubble.innerHTML = text;
            messageDiv.appendChild(bubble);
            chatBody.appendChild(messageDiv);

            chatBody.scrollTop = chatBody.scrollHeight;
            return messageDiv;
        }

        // Display Welcome Message and Service Buttons
        function displayWelcomeMessage() {
            chatBody.innerHTML = '';

            const welcomeText = `Hi! Welcome to <br><b>${hospitalName}</b>.<br><br>Please select a service from the options below to know more about our treatments.`;

            appendMessage(welcomeText, 'bot');

            setTimeout(() => {
                const buttonsContainer = document.createElement('div');
                buttonsContainer.className = 'text-center mt-3';

                Object.keys(services).forEach(key => {
                    const btn = document.createElement('button');
                    btn.className = 'service-btn';
                    btn.textContent = services[key].name;
                    btn.onclick = () => showServiceDetails(key);
                    buttonsContainer.appendChild(btn);
                });

                chatBody.appendChild(buttonsContainer);
                chatBody.scrollTop = chatBody.scrollHeight;
            }, 600);
        }

        // Show Service Details
        function showServiceDetails(serviceKey) {
            const service = services[serviceKey];

            const userClickedMsg = `Tell me more about ${service.name}.`;
            appendMessage(userClickedMsg, 'user');

            const contentMessage = service.content;

            const contactMessage = `
            ${contentMessage}
            <hr style="margin: 10px 0; border: 0; border-top: 1px solid #ccc;">
            For more details or to book an appointment, please contact <b>${hospitalName}</b>.<br><br>
            <b>Contact Number:</b> <a href="tel:${contactNumber}">${contactNumber}</a>
        `;

            setTimeout(() => {
                appendMessage(contactMessage, 'bot');

                const restartBtnContainer = document.createElement('div');
                restartBtnContainer.style.textAlign = 'center';
                restartBtnContainer.style.marginTop = '10px';
                restartBtnContainer.style.marginBottom = '10px';

                const restartBtn = document.createElement('button');
                restartBtn.className = 'restart-btn';
                restartBtn.textContent = 'Back to Main Menu';
                restartBtn.onclick = displayWelcomeMessage;

                restartBtnContainer.appendChild(restartBtn);
                chatBody.appendChild(restartBtnContainer);
                chatBody.scrollTop = chatBody.scrollHeight;
            }, 600);
        }

        // Ensure chatbot starts closed
        document.addEventListener('DOMContentLoaded', () => {
            chatbotWindow.style.display = 'none';
        });
    </script>

</body>

</html>