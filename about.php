<?php include('header.php'); ?>

<style>
    .event-container {
        display: flex;
        align-items: center;
        margin: 40px 0;
    }
    .event-container:nth-child(even) {
        flex-direction: row-reverse;
    }
    .event-image {
        width: 50%;
        padding: 20px;
    }
    .event-image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }
    .event-desc {
        width: 50%;
        padding: 20px;
    }
    .event-title {
        font-size: 24px;
        font-weight: bold;
        color: #d32f2f;
    }
    .event-text {
        font-size: 18px;
    }
</style>
<h1 class="text-center my-4">About us</h1>
<br>
<div class="container">
    <h2 class="text-center my-4">College Events</h2>

    <div class="event-container">
        <div class="event-desc">
            <h3 class="event-title">College Events</h3>
            <p class="event-text">Various academic and technical events are conducted in the college to enhance students' learning experiences.</p>
        </div>
        <div class="event-image">
            <img src="images/event1.jpg" alt="College Events">
        </div>
    </div>

    <div class="event-container">
        <div class="event-image">
            <img src="images/event2.jpg" alt="Cultural Events">
        </div>
        <div class="event-desc">
            <h3 class="event-title">Cultural Events</h3>
            <p class="event-text">Cultural events such as dance, drama, and fashion shows bring out students' creative and artistic talents.</p>
        </div>
    </div>

    <div class="event-container">
        <div class="event-desc">
            <h3 class="event-title">Singing Events</h3>
            <p class="event-text">Singing competitions and musical events provide a platform for students to showcase their vocal skills.</p>
        </div>
        <div class="event-image">
            <img src="images/event3.jpg" alt="Singing Events">
        </div>
    </div>

    <div class="event-container">
        <div class="event-image">
            <img src="images/event4.jpg" alt="Sports Events">
        </div>
        <div class="event-desc">
            <h3 class="event-title">Sports Events</h3>
            <p class="event-text">Sports competitions help students develop teamwork, discipline, and physical fitness.</p>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>