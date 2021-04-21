### Simple Message App Test

This is what I could pull off in three hours! I'd have liked to implement a more modern SPA/API approach (I'm used to writing APIs in Laravel),
but it was fun trying out blade for the first time. There are elements of repetition where components could have been used, given more time.

I'd also liked to have implemented one of Laravel's boilerplate auth systems but I felt I should stick to the spec.
One mistake I made after I'd made my final commit within the 3h window was I should have tweaked the logic to assume a message has been read 
when the archive button was pressed.


### How to run
>I used Laravel Sail for this test as it's quick and easy to run a dev environment out of the box, and I typically use Docker anyway.
>
>I wouldn't use/recommend Sail for an actual production-intended app as it is quite tricky to scale and CI/CD. I would instead opt for optimised custom containers.
> 
> ref: https://laravel.com/docs/8.x/sail

1. `./vendor/bin/sail up -d`
2. `./vendor/bin/sail artisan migrate` (you can optionally use `db:seed` as well if you like, there is a factory for the `Message` model)
3. `npm run dev` or `npm run prod`
4. Go to `http://localhost` in browser and the app should be ready to use.
