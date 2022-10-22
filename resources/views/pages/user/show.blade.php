<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
    }

    html {
        font-size: 80%;
        overflow-x: hidden;
        background-color: #F3F6FF;
    }

    .profile-container {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        min-height: 100vh;
    }

    .profile-container .profile {
        width: 40rem;
        border-radius: .5rem;
        background-color: #FFFF;
        padding: 2rem;
        text-align: center;
    }

    .profile-container .profile img {
        height: 20rem;
        width: 20rem;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: .5rem;
    }

    .profile-container .profile h3 {
        font: 25px Viga;
        padding: .5rem 0;
        color: #000;
    }

    .option-btn {
        display: block;
        width: 100%;
        border-radius: .5rem;
        color: var(--white);
        font-size: 1.8rem;
        cursor: pointer;
        padding: 1rem 3rem;
        text-transform: capitalize;
        text-align: center;
        margin-top: 1rem;
    }

    .option-btn:hover {
        background-color: #FFFF;
        color: #000;
    }

    .option-btn {
        background-color: #62ACCC;
    }

    .flex-btn {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .flex-btn>* {
        flex: 1;
    }
</style>

<body>

    <section class="profile-container">
        <div class="profile">
            @if ($user->foto !== null)
            <img src="//project.smkn2trenggalek.sch.id:6500/public/user/{{ $user->foto }}" alt="">
            @endif
            <h3>{{ $user->nama }}</h3>
            <h3>{{ $user->email }}</h3>
            <div class="flex-btn">
                <a href="{{ route('home') }}" class="option-btn">Kembali</a>
                <a href="{{ route('user.profile') }}" class="option-btn">Edit Profile</a>
            </div>
        </div>

    </section>

</body>

</html>
