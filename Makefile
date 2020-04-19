install:
	 composer install
run:
	php -S localhost:8000 -t public
lint:
	composer run-script phpcs -- --standard=PSR12 app routes tests
test:
	composer run-script phpunit tests
push:
	git push -u origin master
