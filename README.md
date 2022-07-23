## Movie Rental System

Hi everyone, in this repository I want to practice more my Laravel Skills but more in depth in the design of authentic REST APIS, stateless APIS that
dont make use of the server or the DB to store sessions. I'll use JSON Web Token to handle sessions in this practice.

For the front end, maybe I'll use vue with JSON Web Token and the rest of the interfaces If I want to, because to be honest doing interfaces and practicing more front end's not my focus right now, but for now I'm more focused on backend.

The database has been designed 100% with the Migration API, based on the following diagram:


![image](https://user-images.githubusercontent.com/78714792/179668712-5a7dca63-57e1-495e-a705-f54067e05412.png)

As you can see it's a ER Model, and the resultant relational model is the following:


![MovieRentalBd](https://user-images.githubusercontent.com/78714792/179668900-e3e5af16-f28e-4e1e-ad13-8841170739dc.png)

I was having difficulties to code the joins in Eloquent but I catched the idea and I made a diagram so I can remember in future how this works
and you can also support with it:


![EloquentDgrmV2](https://user-images.githubusercontent.com/78714792/180081624-6cb7812d-7e31-4102-a124-df6e369285fd.png)


I tested one of the endpoints (/v1/getAllMovies) on JMeter, Laptop is 4gb, intel i3-6006u 2.0 ghz, the results are pretty positive
![image](https://user-images.githubusercontent.com/78714792/180618447-b1e68a34-3884-4246-824f-a53bd31db372.png)

Laravel with my equipment can handle 100.000+ requests per minute, so a small digital ocean dropplet can be enough for small-medium proyects

As I told, I'll use: 

-Eloquent ORM for the querys


-JSON Web Token for Authentication


-And maybe I'll implement Redis for caching the Querys and improve responses times, but it depends.


-Stores procedures to trigger when a client returns the movie and the rent concludes.
