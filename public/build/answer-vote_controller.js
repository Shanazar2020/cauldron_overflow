function clickVote(event, url, direction) {
    event.preventDefault();
    console.log(url);
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            direction: direction
        })
    })
        .then(response => response.json())
        .then(data => {
            const answerId = new URL(url).searchParams.get('id');
            document.querySelector(`[data-vote-total="${answerId}"]`).innerHTML = data.votes;
        });
}

