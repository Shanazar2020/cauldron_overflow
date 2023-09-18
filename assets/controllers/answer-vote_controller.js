import {Controller} from 'stimulus';
import axios from 'axios';

export default class extends Controller {
    static targets = ['voteTotal'];
    static values = {
        url: String,
    }

    clickVote(event) {
        event.preventDefault();
        const button = event.currentTarget;

        axios.post(this.urlValue, JSON.stringify({
            direction: button.value
        }))
            .then((response) => {
                console.log(response);
                this.voteTotalTarget.innerHTML = response.data.votes;
            })
        ;
    }
}