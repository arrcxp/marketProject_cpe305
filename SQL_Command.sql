------> userinforamtion table
create table CREDIT_CARD(
	FNAME varchar(255),
	LNAME varchar(255),
	EMAIL varchar(255),
	PASSWORD varchar(255),
	TEL varchar(255),
);

------> credit_card table
create table CREDIT_CARD(
	CARD_NUMBER varchar(255),
	EXP_DATE varchar(255),
	CVV varchar(255) primary key,
	OWNER_NAME varchar(255),
	ADDRESS varchar(255),
	POSTCODE varchar(255),
);

------> Recommended_menu table
create table Recommended_menu (
	id_menu varchar(255),
	name varchar(255),
	ingredient nvarchar(max),
	how_to nvarchar(max),
);

insert into Recommended_menu (id_menu, name, ingredient, how_to) values (
	'001',
    'Fresh Bitter Gourd Salad',
    '200 grams of bitter melon, 100 grams of fresh shrimp, 2 tablespoons coarsely chopped birds eye chilli, 1 tablespoon fish sauce, 1 tablespoon lemon juice, ½ tablespoon sugar, 10 grams of radish, 20 grams of cherry tomatoes, 1 tablespoon of celery',
    'Bring the pot to medium heat. Pour in the water. Then add fresh shrimp and boil, Put fish sauce into the bowl. Follow with chopped birds eye chilli, lime juice, and sugar. Stir well until the sugar dissolves, Add boiled fresh shrimp. Follow with cherry tomatoes, radishes, bitter melon and celery. Mix well, Put green oak and red oak on a plate. Scoop in the fresh bitter melon salad.'
);

insert into Recommended_menu (id_menu, name, ingredient, how_to) values (
	'002',
    'Whole grain baked rice',
    '1 cup jasmine rice, 1 tablespoon vegetable oil, 350 milliliters of water, 1 tablespoon coarsely chopped garlic, 20 grams of red beans,  20 grams of green beans, 20 grams of millet, 20 grams of diced taro, 20 grams of chopped pumpkin, Ginkgo 20 grams, 20 grams of corn, 20 grams of shiitake mushrooms, sliced, 20 grams of diced carrots, 1 tablespoon soy sauce, 1 tablespoon oyster sauce, ½ teaspoon salt.',
    'Bring the pan to medium heat. Pour in the oil. Wait until the oil is hot. Add the garlic and stir-fry until golden and fragrant. Then follow with the remaining ingredients such as jasmine rice, red beans, mung bean, millet, diced taro, corn, diced pumpkin, diced shiitake mushrooms, and diced carrots. Season with soy sauce, oyster sauce, and salt. Stir well. Then remove from the oven, Scoop into the prepared clay pot, add ginkgo, followed by water. Close the lid and bring to a boil over medium heat. Once the rice is cooked, you can serve it.'
);

------> shopping_cart table
create table shopping_cart (
	product_name varchar(255),
	price int
);
