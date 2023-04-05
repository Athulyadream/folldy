import React, { Component } from 'react'
import { View, StyleSheet, Text } from 'react-native'

export default class App extends Component {
    state = {
        data: 'hi'
    }

    componentDidMount() {
        fetch("http://139.59.71.149/api/v1/Student/add_audio_practice", {
            "method": "POST",
            "headers": {
                "x-rapidapi-host": "community-manga-eden.p.rapidapi.com",
                "x-rapidapi-key": "55e095e2damshd8dd8bedc0fbde4p169b25jsn6898d56b4038"
            }
        })
            .then(res => res.json())
            .then(response => {
                console.log(response);
                this.setState({ data: response })
            })
            .catch(err => {
                console.log(err);
                this.setState({ data: err })
            });
    }
    render() {
        return (
            <View style={styles.container}>
                <Text>{JSON.stringify(this.state.data)}</Text>
            </View>
        )
    }
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
    }
})
// import React from 'react';
// import ReactDOM from 'react-dom';






// const formData = new FormData();
// // formData.append('paudio','1601891643.mp3');
// formData.append('session', '16012847981384');
// formData.append('practice_id', '2');

// formData.append('id', '35');

// formData.append('title', 'cdfs');



// fetch("http://139.59.71.149/api/v1/Student/add_audio_practice", {
//     method: 'post',
//     body: formData
// })
// .then(res => res.json())
// .then(
// (result) => {
//     console.log(result);
// }).catch(err => {
//     console.log(err);
// })

// function tick() {
//     const element = (
//         <div>
//             <h1>Hello, world!</h1>
//             <h2>It is {new Date().toLocaleTimeString()}.</h2>
//         </div>
//     );

//     ReactDOM.render(
//         element,
//         document.getElementById('root')
//     );
// }

// setInterval(tick, 1000);