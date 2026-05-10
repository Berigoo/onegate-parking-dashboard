document.addEventListener('livewire:init', () => {
    const socket = io("http://127.0.0.1:8080");

    Livewire.on('register-started', ({ sessionId }) => {
        socket.emit("register_subscribe", {
            session_id: sessionId
        });
    });

    socket.on("register_result", (data) => {
        // const input = document.querySelector('[id="form.uid"]');
        // if (input) {
        //     input.value = data.uid;
        //     input.dispatchEvent(new Event('input', { bubbles: true }));
        // }

	window.Livewire.dispatch('card-read-success', {
            uid: data.uid
	});
    });
});
