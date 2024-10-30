<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Push Notifications</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

    <h2>Kirim menggunakan token</h2>
    <form x-data="{ title: '', content: '', token: '' }" @submit.prevent="
    (async () => {
        const url = '/send-using-token';
        try {
            const data = new FormData();
            data.append('_token', '{{ csrf_token() }}');
            data.append('token', token);
            data.append('title', title);
            data.append('content', content);

            const response = await fetch(url, {
                method: 'POST',
                body: data,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            });
            const json = await response.json();
            
            if (!response.ok) {
                let message = '';
                if (json.errors) {
                    for (const [_, e] of Object.entries(json.errors)) {
                        message += `${e}\n`;
                    }
                    throw new Error(`gagal kirim pesan\n${message}`);
                } else {
                    throw new Error(`gagal kirim pesan\n${json.message}`);
                }
            }
            
            alert('pesan berhasil di tambahkan');

            $refs.title.value = '';
            $refs.content.value = '';
            $refs.token.value = '';
        } catch (error) {
            alert(error.message);
          }
    })();
    ">
        <div>
            <label for="token">Token</label>
            <br>
            <input x-ref="token" name="token" type="text" @keyup="token = $event.target.value"></input>
        </div>

        <div>
            <label for="title">Title</label>
            <br>
            <input x-ref="title" name="title" type="text" @keyup="title = $event.target.value"></input>
        </div>

        <div>
            <label for="content">Content</label>
            <br>
            <textarea x-ref="content" name="content" cols="30" rows="10"
                @keyup="content = $event.target.value"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>



    <h2>Kirim menggunakan Topic</h2>
    <form x-data="{ title: '', content: '', topic: '' }" @submit.prevent="
    (async () => {
        const url = '/send-using-topic';
        try {
            const data = new FormData();
            data.append('_token', '{{ csrf_token() }}');
            data.append('topic', topic);
            data.append('title', title);
            data.append('content', content);

            const response = await fetch(url, {
                method: 'POST',
                body: data,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            });
            const json = await response.json();
            
            if (!response.ok) {
                let message = '';
                if (json.errors) {
                    for (const [_, e] of Object.entries(json.errors)) {
                        message += `${e}\n`;
                    }
                    throw new Error(`gagal kirim pesan\n${message}`);
                } else {
                    throw new Error(`gagal kirim pesan\n${json.message}`);
                }
            }
            
            alert('pesan berhasil di tambahkan');

            $refs.title.value = '';
            $refs.content.value = '';
            $refs.topic.value = '';
          } catch (error) {
            alert(error.message);
          }
    })();
    ">
        <div>
            <label for="topic">Topic</label>
            <br>
            <input x-ref="topic" name="topic" type="text" @keyup="topic = $event.target.value"></input>
        </div>

        <div>
            <label for="title">Title</label>
            <br>
            <input x-ref="title" name="title" type="text" @keyup="title = $event.target.value"></input>
        </div>

        <div>
            <label for="content">Content</label>
            <br>
            <textarea x-ref="content" name="content" cols="30" rows="10"
                @keyup="content = $event.target.value"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>

</body>

</html>