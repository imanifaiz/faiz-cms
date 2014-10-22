<?php

class PostsTableSeeder extends Seeder {

	protected $excerpt1 = 'In this series, we\'re walking through how to create maintainable WordPress meta boxes. That is, we\'re looking at some best practices that we can employ in our WordPress development to make sure that we\'re writing code that\'s maintainable by ourselves or by our team, as it continues to evolve over time.In the first post, we looked at the initial directory structure and setup the basic code required to get a plugin running in WordPress. In this post, we\'re going to continue planning and building our plugin. We\'ll also be talking about the decisions that we\'re making when it comes to...';

    protected $content1 = '<p>
	When it comes to design patterns, you may have questions:
</p>
<blockquote>
	Why should we use design patterns in programming? Our code can work just fine without it.
</blockquote>
<p>
	To that, my counter question would be: "Would you rather live in a luxurious home, or in a simple establishment with four walls?" After all, both serve our purpose.
</p>
<p>
	Generally, we look for a luxurious home because it offers better facilities and requires less maintenance, and maintenance can done with less hassle because the basic groundwork is already there.
</p>
<p>
	The same thing applies to programming: Code that employs design patterns is easy to understand, easy to maintain, and easy to extend.
</p>
<p>
	In this series of tutorials, we will cover some different design patterns that are available to us in programming. You\'ll learn about their pros and cons, and factors that indicate where we should use them.
</p>
<p>
	Throughout these tutorials, I will take PHP as a base language to demonstrate design patterns; however, they are actually a concept that can be applied to any programming language—it\'s just a matter of changing the syntax as per your preferred language.<br>
</p>
<p>
	Design rules are separated into four categories:<br>
</p>
<ul>
	<li>creational patterns</li>
	<li>structural patterns</li>
	<li>behavioral patterns</li>
	<li>concurrency patterns</li>
</ul>
<p>
	In this tutorial, we are going to cover the facade design pattern. It falls under the category of structural patterns because it deals with how your code should be structured to make it easily intelligible and keep it well maintained in the long term.<br>
</p>
<h2>Facade Design Pattern<br>
</h2>
<h3>The UML</h3>
<img alt="" src="https://cms-assets.tutsplus.com/uploads/users/436/posts/22238/image/facade_design_pattern.jpg">
<h3>Problem<br>
</h3>
<p>
	Let\'s assume that you have a few operations to be made in sequence, and that the same action is required in multiple places within your application. You have to place the same code again and again in different places. You have done that, but after a few days you find that something needs to be changed in that code.
</p>
<p>
	Do you see the problem? We have to introduce the changes in all of the places that the code exists. It\'s painful, isn\'t it?<br>
</p>
<h3>Solution<br>
</h3>
<p>
	As a solution, what you should be doing is to create a lead controller, which handles all of the repeating code. From the calling point of view, we will just call the lead controller to perform actions based on the parameters provided.
</p>
<p>
	Now if we need to introduce any change in the process, then we will just need to change the lead controller instead of making the change in all places where we used that code.<br>
</p>
<h3>Example<br>
</h3>
<p>
	In this tutorial, let\'s choose one lesson so that it makes things more readable. Let\'s say that you have been given a task to plan your friend\'s marriage. If you do everything on your own, then imagine the things you need to cover. It will create a higher possibility for error, and increase the chance of missing something that can drastically affect your friend\'s wedding.<br>
</p>
<p>
	In this case, instead of doing everything on your own, you should use a wedding planner and make sure the job gets done in a well-managed manner with less chance of a mistake.<br>
</p>
<p>
	Here, you are behaving as a client who initiates the process, and the wedding planner is working as a "facade" for you, completing the job based on your direction.<br>
</p>
<h2>Code Example</h2>
<p>
	In this section we will see one more example, which is very common for websites, of course with a code example. We will see an implementation of the facade design pattern using a product checkout process. But before checking perfect code with the facade pattern, let\'s have a look at some code that has a problem.
</p>
<p>
	A simple checkout process includes the following steps:<br>
</p>
<ol>
	<li>Add product to cart.</li>
	<li>Calculate shipping charge.</li>
	<li>Calculate discount.</li>
	<li>Generate order.</li>
</ol>
<h3>Problem</h3>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
		<p>
			17
		</p>
		<p>
			18
		</p>
		<p>
			19
		</p>
		<p>
			20
		</p>
		<p>
			21
		</p>
	</td>
	<td>
		<code>// Simple CheckOut Process</code>
		<p>
			<code>$productID</code> <code>= </code><code>$_GET</code><code>[</code><code>\'productId\'</code><code>];</code>
		</p>
		<p>
			<code>$qtyCheck</code> <code>= new productQty();</code>
		</p>
		<p>
			<code>if</code><code>(</code><code>$qtyCheck</code><code>-&gt;checkQty(</code><code>$productID</code><code>) &gt; 0) {</code>
		</p>
		<p>
			<code> </code><code>// Add Product to Cart</code>
		</p>
		<p>
			<code> </code><code>$addToCart</code> <code>= new addToCart(</code><code>$productID</code><code>);</code>
		</p>
		<p>
			<code> </code><code>// Calculate Shipping Charge</code>
		</p>
		<p>
			<code> </code><code>$shipping</code> <code>= new shippingCharge();</code>
		</p>
		<p>
			<code> </code><code>$shipping</code><code>-&gt;updateCharge();</code>
		</p>
		<p>
			<code> </code><code>// Calculate Discount Based on </code>
		</p>
		<p>
			<code> </code><code>$discount</code> <code>= new discount();</code>
		</p>
		<p>
			<code> </code><code>$discount</code><code>-&gt;applyDiscount();</code>
		</p>
		<p>
			<code> </code><code>$order</code> <code>= new order();</code>
		</p>
		<p>
			<code> </code><code>$order</code><code>-&gt;generateOrder();</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	In the above code, you will find that the checkout procedure includes various objects that need to be produced in order to complete the checkout operation. Imagine that you have to implement this process in multiple places. If that\'s the case, it will be problematic when the code needs to be modified. It\'s better to make those changes in all places at once.
</p>
<h3>Solution<br>
</h3>
<p>
	We will write the same thing with the facade pattern, which makes the same code more maintainable and extendable.
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
		<p>
			17
		</p>
		<p>
			18
		</p>
		<p>
			19
		</p>
		<p>
			20
		</p>
		<p>
			21
		</p>
		<p>
			22
		</p>
		<p>
			23
		</p>
		<p>
			24
		</p>
		<p>
			25
		</p>
		<p>
			26
		</p>
		<p>
			27
		</p>
		<p>
			28
		</p>
		<p>
			29
		</p>
		<p>
			30
		</p>
		<p>
			31
		</p>
		<p>
			32
		</p>
		<p>
			33
		</p>
		<p>
			34
		</p>
		<p>
			35
		</p>
		<p>
			36
		</p>
		<p>
			37
		</p>
		<p>
			38
		</p>
		<p>
			39
		</p>
		<p>
			40
		</p>
		<p>
			41
		</p>
		<p>
			42
		</p>
		<p>
			43
		</p>
		<p>
			44
		</p>
		<p>
			45
		</p>
		<p>
			46
		</p>
		<p>
			47
		</p>
		<p>
			48
		</p>
		<p>
			49
		</p>
		<p>
			50
		</p>
		<p>
			51
		</p>
		<p>
			52
		</p>
		<p>
			53
		</p>
		<p>
			54
		</p>
		<p>
			55
		</p>
		<p>
			56
		</p>
		<p>
			57
		</p>
		<p>
			58
		</p>
		<p>
			59
		</p>
	</td>
	<td>
		<code>class</code> <code>productOrderFacade {</code>
		<p>
			<code> </code><code>public</code> <code>$productID</code> <code>= </code><code>\'\'</code><code>;</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>__construct(</code><code>$pID</code><code>) {</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;productID = </code><code>$pID</code><code>;</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>generateOrder() {</code>
		</p>
		<p>
			<code> </code><code>if</code><code>(</code><code>$this</code><code>-&gt;qtyCheck() &gt; 0) {</code>
		</p>
		<p>
			<code> </code><code>// Add Product to Cart</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;addToCart();</code>
		</p>
		<p>
			<code> </code><code>// Calculate Shipping Charge</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;calulateShipping();</code>
		</p>
		<p>
			<code> </code><code>// Calculate Discount if any</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;applyDiscount();</code>
		</p>
		<p>
			<code> </code><code>// Place and confirm Order</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;placeOrder();</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>private</code> <code>function</code> <code>addToCart () {</code>
		</p>
		<p>
			<code> </code><code>/* .. add product to cart .. */</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>private</code> <code>function</code> <code>qtyCheck() {</code>
		</p>
		<p>
			<code> </code><code>$qty</code> <code>= </code><code>\'get product quantity from database\'</code><code>;</code>
		</p>
		<p>
			<code> </code><code>if</code><code>(</code><code>$qty</code> <code>&gt; 0) {</code>
		</p>
		<p>
			<code> </code><code>return</code> <code>true;</code>
		</p>
		<p>
			<code> </code><code>} </code><code>else</code> <code>{</code>
		</p>
		<p>
			<code> </code><code>return</code> <code>true;</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>private</code> <code>function</code> <code>calulateShipping() {</code>
		</p>
		<p>
			<code> </code><code>$shipping</code> <code>= </code><code>new</code> <code>shippingCharge();</code>
		</p>
		<p>
			<code> </code><code>$shipping</code><code>-&gt;calculateCharge();</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>private</code> <code>function</code> <code>applyDiscount() {</code>
		</p>
		<p>
			<code> </code><code>$discount</code> <code>= </code><code>new</code> <code>discount();</code>
		</p>
		<p>
			<code> </code><code>$discount</code><code>-&gt;applyDiscount();</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>private</code> <code>function</code> <code>placeOrder() {</code>
		</p>
		<p>
			<code> </code><code>$order</code> <code>= </code><code>new</code> <code>order();</code>
		</p>
		<p>
			<code> </code><code>$order</code><code>-&gt;generateOrder();</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	As of now, we have our product order facade ready. All we have to do is use it with a few communication channels of code, instead of a bunch of code as expressed in the previous part.
</p>
<p>
	Please check the amount of code below which you will need to invest in order to have a checkout process at multiple positions.
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
	</td>
	<td>
		<code>// Note: We should not use direct get values for Database queries to prevent SQL injection</code>
		<p>
			<code>$productID</code> <code>= </code><code>$_GET</code><code>[</code><code>\'productId\'</code><code>];</code>
		</p>
		<p>
			<code>// Just 2 lines of code in all places, instead of a lengthy process everywhere</code>
		</p>
		<p>
			<code>$order</code> <code>= </code><code>new</code> <code>productOrderFacade(</code><code>$productID</code><code>);</code>
		</p>
		<p>
			<code>$order</code><code>-&gt;generateOrder();</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	Now imagine when you need to make alterations in your checkout process. Now you simply create changes in the facade class that we have created, rather than introducing changes in every place where it has been applied.<br>
</p>
<h2>Conclusion<br>
</h2>
<p>
	Simply put, we can say that the facade pattern should be carried out in a situation where you need a single interface to complete multiple procedures, as in the example of the wedding planner who is working as a facade for you to complete multiple procedures.<br>
</p>
<p>
	Please leave any comments or questions in the feed below.
</p>';

protected $excerpt2 = 'WordPress provides theme developers with a powerful system for creating easy-to-use theme option systems via the Theme Customizer. While the customizer provides an excellent real-time preview system and a great overall user experience, defining the output of options set in the customizer can get messy. In this tutorial, I will show you how to simplify getting color options that are set in the customizer into CSS in the front-end. This simple system can be adapted for use with other CSS properties as well as. This means that you can use these techniques to work with options set via other methods...';

protected $content2 = '<p>
	WordPress provides theme developers with a powerful system for creating easy-to-use theme option systems via the Theme Customizer. While the customizer provides an excellent real-time preview system and a great overall user experience, defining the output of options set in the customizer can get messy.
</p>
<p>
	In this tutorial, I will show you how to simplify getting color options that are set in the customizer into CSS in the front-end. This simple system can be adapted for use with other CSS properties as well as. This means that you can use these techniques to work with options set via other methods than the Theme Customizer.
</p>
<h2>What We Are Trying to Avoid</h2>
<p>
	Too often, getting colors and other options set in Theme Customizer involves messy code mixing PHP and CSS.
</p>
<p>
	For example:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
	</td>
	<td>
		<code>add_action( </code><code>\'wp_head\'</code><code>, </code><code>\'slug_theme_customizer_css\'</code> <code>);</code>
		<p>
			<code>function</code> <code>slug_theme_customizer_css() {</code>
		</p>
		<p>
			<code> </code><code>?&gt;</code>
		</p>
		<p>
			<code> </code><code>&lt;style type=</code><code>"text/css"</code><code>&gt;</code>
		</p>
		<p>
			<code> </code><code>h1.site-title a {</code>
		</p>
		<p>
			<code> </code><code>color: &lt;?php </code><code>echo</code> <code>get_theme_mod( </code><code>\'site_title_color\'</code><code>, </code><code>\'#ff0000\'</code> <code>); ?&gt;;</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>h3.site-description {</code>
		</p>
		<p>
			<code> </code><code>color: &lt;?php </code><code>echo</code> <code>get_theme_mod( </code><code>\'site_description_color\'</code><code>, </code><code>\'#000\'</code> <code>); ?&gt;;</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>&lt;/style&gt;</code>
		</p>
		<p>
			<code> </code><code>&lt;?php</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	The problem with this code is not purely aesthetic, or that it is hard to read. It\'s too easy to make a mistake. For example, closing PHP tags, followed by closing the CSS declaration leads to this:<code>?&gt;;</code>, which looks wrong, but is technically correct.<br>
</p>
<p>
	While you could start this function by getting all of the color values you need into variables, you\'d still need to open PHP tags to echo their values in the CSS. Still, that\'s a good start. The ability to put CSS color values into variables, of course, is one of the many great things about using a CSS preprocessor.
</p>
<p>
	While adding a full-blown Sass or LESS processor to your theme is possible, and there are plugins to do it, that\'s going overboard for a simple task of converting a few variables to hexadecimal values. Instead, I\'m going to show you how to create a simple preprocessor in your theme with just a few lines of code.
</p>
<h2>Better CSS Markup<br>
</h2>
<p>
	The first thing you are going to need to do is create a file in your theme called<code>customizer.css</code>. This file really could have any extension, but giving it a <code>css</code>extension means that your code editor or IDE will treat it as a CSS file making it easier to work with.
</p>
<p>
	In <code>customizer.css</code> you can reformat that ugly code from the previous example into this:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
		<p>
			7
		</p>
	</td>
	<td>
		<code>h</code><code>1</code><code>.site-title a {</code>
		<p>
			<code> </code><code>color</code><code>: [site_title_color];</code>
		</p>
		<p>
			<code>}</code>
		</p>
		<p>
			<code>h</code><code>3</code><code>.site-description {</code>
		</p>
		<p>
			<code> </code><code>color</code><code>: [site_description_color];</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	As you can see, you are now able to write CSS as if it was CSS. You simply replace the values that will be set from the customizer with the name of the <code>theme_mod</code> in brackets. These strings will be replaced by our preprocesser with their value from the database. The most important thing here is that you use the name of your theme mods as your substitution value in the unprocessed CSS.<br>
</p>
<h2>Building Your Preprocessor</h2>
<p>
	The preprocesser itself is actually incredibly simple as it takes the contents of your<code>customizer.css</code> and uses the PHP <code>str_replace()</code> function to replace the values in brackets with values from the customizer.
</p>
<p>
	The whole system involves one simple class with three methods and one function outside of the class, hooked to <code>wp_head</code> to output processed and optimized CSS. Keep in mind that this code presumes all of the data we need is stored in theme mods, which is the default for the theme customizer. You may need to replace<code>get_theme_mod()</code> with <code>get_option()</code> in your code, depending on your exact needs.
</p>
<p>
	This class uses a <code>foreach</code> loop in each method. If you are not familiar with how<code>foreach</code> loops, I recommend taking a look at <a href="http://code.tutsplus.com/articles/mastering-wordpress-meta-data-working-with-loops--wp-34609" rel="external" target="_blank" sl-processed="1">my article on working with loops and arrays</a>. Also, if you are not familiar with PHP classes or object-oriented PHP (OOP) in general, you should check out <a href="http://code.tutsplus.com/tutorials/object-oriented-programmToming-in-wordpress-an-introduction--cms-19916" rel="external" target="_blank" sl-processed="1">Tom McFarlin\'s introductory series on OOP</a>.<br>
</p>
<p>
	To begin, in a your <code>functions.php</code> or in a file included in it, create an empty class called <code>slug_theme_customizer_output</code> replacing "slug" with your theme\'s unique slug. It should look like this:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
	</td>
	<td>
		<code>class</code> <code>Slug_Theme_Customizer_Output {</code>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	The first method in the class will be where you set the theme mods that you will be using, as well as default values for each theme mod. You set each one in an array in the form of <code>theme_mod =&gt; default</code>. Sticking with the same two settings as before, it would like this:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
	</td>
	<td>
		<code>function</code> <code>theme_mods() {</code>
		<p>
			<code> </code><code>return</code> <code>array</code><code>(</code>
		</p>
		<p>
			<code> </code><code>\'site_title_color\'</code> <code>=&gt; </code><code>\'#ff0000\'</code><code>,</code>
		</p>
		<p>
			<code> </code><code>\'site_description_color\'</code> <code>=&gt; </code><code>\'#000\'</code>
		</p>
		<p>
			<code> </code><code>);</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	The next step will be to get the current value of each <code>theme_mod</code> and put that in an array that we can use in our actual preprocessor. This method simply gets each value from the <code>theme_mods()</code> method and passes the key as the first argument, which is the theme_mods name to <code>get_theme_mods()</code> while passing the default value as the second argument, which will be returned if there is nothing set in that theme mod. It will look like this:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
	</td>
	<td>
		<code>function</code> <code>prepare_values() {</code>
		<p>
			<code> </code><code>$colors</code> <code>= </code><code>array</code><code>();</code>
		</p>
		<p>
			<code> </code><code>// Get our theme mods and default values.</code>
		</p>
		<p>
			<code> </code><code>$theme_mods</code> <code>= </code><code>$this</code><code>-&gt;theme_mods();</code>
		</p>
		<p>
			<code> </code><code>// For each theme mod, output the value of the theme mod or the default value.</code>
		</p>
		<p>
			<code> </code><code>foreach</code><code>( </code><code>$theme_mods</code> <code>as</code> <code>$theme_mod</code> <code>=&gt; </code><code>$default</code> <code>) {</code>
		</p>
		<p>
			<code> </code><code>$colors</code><code>[ </code><code>$theme_mod</code> <code>] = get_theme_mod( </code><code>$theme_mod</code><code>, </code><code>$default</code> <code>);</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>return</code> <code>$colors</code><code>;</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	Now we have an array in the form of <code style="line-height: 1.6em;">\'theme_mod_name\' =&gt; \'value to replace\'</code>and our ready to process the CSS in the third and final method of this class.
</p>
<p>
	In the <code>foreach</code> loop in this method, we are taking advantage of the ability that PHP gives us to treat the array\'s key and value as separate variables. This is a really powerful feature of PHP <code>foreach</code> loops that requires a little planning in how each array is structured and makes life much easier.<br>
</p>
<p>
	The first step will be to use <code>file_get_contents()</code> to convert the <code>customizer.css</code>file into a string and store it in a variable. Since this function will cause a fatal error if it can\'t find the file, we need to wrap all code in this method in a test if the file exists at all.
</p>
<p>
	Note that this code assumes that <code>customizer.css</code> is in the same directory as the class, you may need to adjust for your theme\'s file structure. Here is how we begin this method:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
	</td>
	<td>
		<code>function</code> <code>process() {</code>
		<p>
			<code> </code><code>$css</code> <code>= </code><code>\'\'</code><code>;</code>
		</p>
		<p>
			<code> </code><code>// Modify this filename and / or location to meet your needs.</code>
		</p>
		<p>
			<code> </code><code>$theme_customizer_file</code> <code>= trailingslashit( dirname( </code><code>__FILE__</code> <code>) ) . </code><code>\'theme_customizer.css\'</code><code>;</code>
		</p>
		<p>
			<code> </code><code>// Make sure the file exists.</code>
		</p>
		<p>
			<code> </code><code>if</code> <code>( </code><code>file_exists</code><code>( </code><code>$theme_customizer_file</code> <code>) ) {</code>
		</p>
		<p>
			<code> </code><code>// Get contents of the file.</code>
		</p>
		<p>
			<code> </code><code>$css</code> <code>= </code><code>file_get_contents</code><code>( </code><code>$theme_customizer_file</code> <code>);</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	As I said before, this whole method is wrapped in a check if the file exists. That means that it will return <code>false</code> if the file doesn\'t load. Keep that in mind as we will need to account for that possibility later.
</p>
<p>
	Now that we have the CSS as a string, we will need to get our arrays of substitution values from the <code>prepare_values()</code> method. Again, we will be using the array key and variable as separate variables in the <code>foreach</code> loop. For each <code>theme_mod</code> we have to add brackets around it then we can use it to replace the substitution string in the CSS with <code>str_replace()</code>, like this:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
		<p>
			7
		</p>
		<p>
			8
		</p>
	</td>
	<td>
		<code>// Get our colors.</code>
		<p>
			<code>$colors = $this-&gt;prepare_values();</code>
		</p>
		<p>
			<code>// Replace each color.</code>
		</p>
		<p>
			<code>foreach ( $colors as $theme_mod =&gt; $color ) {</code>
		</p>
		<p>
			<code> </code><code>$search = \'[\' . $theme_mod . \']\';</code>
		</p>
		<p>
			<code> </code><code>$css = str_replace( $search, $color, $css );</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	This loop will give us completely valid CSS with all of our bracketed theme mod names replaced with the correct hex codes for the colors. All that\'s left is wrapping the processed CSS in the appropriate style tags before returning it:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
	</td>
	<td>
		<code>// Add style tags.</code>
		<p>
			<code>$css</code> <code>= </code><code>\'&lt;style type="text/css"&gt;\'</code> <code>. </code><code>"\n"</code> <code>. </code><code>$css</code> <code>. </code><code>"\n"</code> <code>. </code><code>\'&lt;/style&gt;\'</code><code>;</code>
		</p>
		<p>
			<code>return</code> <code>$css</code><code>;</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	That\'s the whole preprocessor. The only step left is to output our CSS itself. To do this, we can use a function, outside of the class that initializes the class and outputs it in the header of the theme.
</p>
<p>
	This function looks like this:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
	</td>
	<td>
		<code>add_action( \'wp_head\', \'slug_theme_customizer_output\' );</code>
		<p>
			<code>function slug_theme_customizer_output() {</code>
		</p>
		<p>
			<code> </code><code>// Make sure our class exists.</code>
		</p>
		<p>
			<code> </code><code>if ( class_exists( \'Slug_Theme_Customizer_Output\') ) {</code>
		</p>
		<p>
			<code> </code><code>// Initialize the class and get processed css.</code>
		</p>
		<p>
			<code> </code><code>$class= new Slug_Theme_Customizer_Output();</code>
		</p>
		<p>
			<code> </code><code>$css = $class-&gt;process();</code>
		</p>
		<p>
			<code> </code><code>// To be safe, make sure `process` method didn\'t return false or anything other than a string.</code>
		</p>
		<p>
			<code> </code><code>if ( $css &amp;&amp; is_string( $css ) ) {</code>
		</p>
		<p>
			<code> </code><code>echo $css;</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	If you may remember from before, the method <code>process()</code> can return false if the CSS file couldn\'t be loaded. In order to account for this possibility, before echoing the value of the <code>process()</code> method, it is important to make sure that it neither returns false, nor returns anything that is not a string.
</p>
<h2>Extra Bonus Optimization</h2>
<p>
	While we could stop there, I\'d like to make things a little more efficient. This system works perfectly fine, but it also does a lot of repetitive processing, complete with what could be several database queries on each page load. Personally, I\'d rather skip running the whole class and instead just get one string from the database.
</p>
<p>
	In order to accomplish this we can rework the output function to cache the CSS in a transient. That way when we can skip the entire preprocessor class if the transient has a value, if it doesn\'t then we can run the whole process and re-cache it. Here is the modified output function:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
		<p>
			17
		</p>
		<p>
			18
		</p>
		<p>
			19
		</p>
		<p>
			20
		</p>
		<p>
			21
		</p>
	</td>
	<td>
		<code>add_action( </code><code>\'wp_head\'</code><code>, </code><code>\'slug_theme_customizer_output\'</code> <code>);</code>
		<p>
			<code>function</code> <code>slug_theme_customizer_output() {</code>
		</p>
		<p>
			<code> </code><code>// Either set css to the transient or rebuild.</code>
		</p>
		<p>
			<code> </code><code>if</code> <code>( false === ( </code><code>$css</code> <code>= get_transient( </code><code>\'slug_theme_customizer_css\'</code> <code>) ) ) {</code>
		</p>
		<p>
			<code> </code><code>// Make sure our class exists.</code>
		</p>
		<p>
			<code> </code><code>if</code> <code>( </code><code>class_exists</code><code>( </code><code>\'Slug_Theme_Customizer_Output\'</code><code>) ) {</code>
		</p>
		<p>
			<code> </code><code>// Initialize the class and get processed css.</code>
		</p>
		<p>
			<code> </code><code>$class</code><code>= </code><code>new</code> <code>Slug_Theme_Customizer_Output();</code>
		</p>
		<p>
			<code> </code><code>$css</code> <code>= </code><code>$class</code><code>-&gt;process();</code>
		</p>
		<p>
			<code> </code><code>// Cache css for next time.</code>
		</p>
		<p>
			<code> </code><code>set_transient( </code><code>\'slug_theme_customizer_css\'</code><code>, </code><code>$css</code> <code>);</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>// To be safe, make sure `process` method didn\'t return false or anything other than a string.</code>
		</p>
		<p>
			<code> </code><code>if</code> <code>( </code><code>$css</code> <code>&amp;&amp; </code><code>is_string</code><code>( </code><code>$css</code> <code>) ) {</code>
		</p>
		<p>
			<code> </code><code>echo</code> <code>$css</code><code>;</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	Now, if there is a value set in the transient <code>slug_theme_customizer_css</code> it can be echoed directly, after passing the same tests to ensure it is neither <code>false</code> or not a string. The preprocessor class isn\'t loaded, and only one query is made to the database. If the transient returns <code>false</code>, the process is run and the value is cached for next time.
</p>
<p>
	Of course, we want to make sure that when theme mods are updated that we clear the transient so it doesn\'t output out of date settings. WordPress will process that whenever a specific option is updated.
</p>
<p>
	We can use this action since theme mods are stored option named for the theme its associated with. For example, TwentyFourteen\'s theme mods are stored in the option <code>theme_mods_twentyfourteen</code>. Here is how we use this action, to clear our transient:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
	</td>
	<td>
		<code>/**</code>
		<p>
			<code> </code><code>* Reset the slug_theme_customizer_css transient when theme mods are updated.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>// Get current theme\'s name.</code>
		</p>
		<p>
			<code>$theme</code> <code>= get_stylesheet();</code>
		</p>
		<p>
			<code>add_action( </code><code>"update_option_theme_mods_{$theme}"</code><code>, </code><code>\'slug_reset_theme_customizer_css_transient\'</code> <code>);</code>
		</p>
		<p>
			<code>function</code> <code>slug_reset_theme_customizer_css_transient() {</code>
		</p>
		<p>
			<code> </code><code>delete_transient( </code><code>\'slug_theme_customizer_css\'</code> <code>);</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<h2>Putting It to Use and Taking It Further<br>
</h2>
<p>
	Now that you can write your CSS that gets updated form the theme customizer with variables, one thing you may want to consider is using one theme mod in many places.
</p>
<p>
	For example, what about instead of setting a theme_mod for each and every color in the theme, and causing options overload, how about options for primary color, secondary color and accent color?
</p>
<p>
	The system that I\'ve shown you how to create here only works with color options, making it only really useful for CSS properties like <code>color</code>, <code>background-color</code>,<code>border-color</code>, etc. You could extend it to be useful for other types of properties.
</p>
<p>
	<span></span>Just remember not to reinvent Sass or LESS, the point of this all was to avoid bloating your theme with a full PHP implementation Sass or LESS, which are already available as plugins.
</p>';

protected $excerpt3 = 'Welcome to this series about developing Laravel applications using a behavior-driven development (BDD) approach. Full stack BDD can seem complicated and intimidating. There are just as many ways of doing it as there are developers. In this series, I will walk you through my approach of using Behat and PhpSpec to design a Laravel application from scratch.There are many resources on BDD in general, but Laravel specific material is hard to find. Therefore, in this series, we will focus more on the Laravel related aspects and less on the general stuff that you can read about many other places.Describing BehaviorWhen...';

protected $content3 = '<p>
	Welcome to this series about developing Laravel applications using a behavior-driven development (BDD) approach. Full stack BDD can seem complicated and intimidating. There are just as many ways of doing it as there are developers.
</p>
<p>
	In this series, I will walk you through my approach of using Behat and PhpSpec to design a Laravel application from scratch.<br>
</p>
<p>
	There are many resources on BDD in general, but Laravel specific material is hard to find. Therefore, in this series, we will focus more on the Laravel related aspects and less on the general stuff that you can read about many other places.
</p>
<h2><a name="user-content-describing-behavior" href="https://github.com/petersuhm/writings/blob/master/laravel-bdd-first-article.md#describing-behavior" sl-processed="1"></a>Describing Behavior</h2>
<p>
	When describing behavior, which is also known as writing stories and specs, we will be using an outside-in approach. This means that every time we build a new feature, we will start by writing the overall user story. This is normally from the clients or stakeholders perspective.
</p>
<blockquote>
	What are we expecting to happen when we do this?
</blockquote>
<p>
	We are not allowed to write any code until we have a failing, red step for example, unless we are refactoring existing code.
</p>
<p>
	Sometimes, it will be necessary to iteratively solve a small part of a story or feature (two words that I use interchangeably) on which we are working. This will often mean writing specs with PhpSpec. Sometimes it will take many iterations on a integration or unit level before the whole story (on an acceptance level) is passing. This all sounds very complicated but it\'s really not. I am a big believer of learning by doing, so I think that everything will make more sense once we start writing some actual code.
</p>
<p>
	We will be writing stories and specs on four different levels:
</p>
<h3><a name="user-content-acceptance" href="https://github.com/petersuhm/writings/blob/master/laravel-bdd-first-article.md#acceptance" sl-processed="1"></a>1. Acceptance</h3>
<p>
	Most of the time, our functional suite will serve as our acceptance layer. The way we will be describing our features in our functional suite will be very similar to how we would write acceptance stories (using an automated browser framework) and would as such create a lot of duplication.
</p>
<p>
	As long as the stories describe the behavior from the client\'s point of view, they serve as acceptance stories. We will use the Symfony DomCrawler to test the output of our application. Later in the series, we might find that we need to test through an actual browser that can run JavaScript as well. Testing through the browser adds some new concerns, since we need to make sure that we load hour test environment when the suite is run.
</p>
<h3><a name="user-content-functional" href="https://github.com/petersuhm/writings/blob/master/laravel-bdd-first-article.md#functional" sl-processed="1"></a>2. Functional</h3>
<p>
	In our functional suite, we will have access to the Laravel application, which is very convenient. First of all, it makes it easy to differentiate between environments. Second of all, not going through a browser makes our test suite a lot faster. Whenever we want to implement a new feature, we will write a story in our functional suite using Behat.
</p>
<h3><a name="user-content-integration" href="https://github.com/petersuhm/writings/blob/master/laravel-bdd-first-article.md#integration" sl-processed="1"></a>3. Integration</h3>
<p>
	Our integration suite will test the behavior of the core part of our application that do not neccessarily need to have access to Laravel. The integration suite will normally be a mixture of Behat stories and PhpSpec specs.
</p>
<h3><a name="user-content-unit" href="https://github.com/petersuhm/writings/blob/master/laravel-bdd-first-article.md#unit" sl-processed="1"></a>4. Unit</h3>
<p>
	Our unit tests will be written in PhpSpec and will test isolated small units of the application core. Our entities, value objects etc. will all have specs.
</p>
<h2><a name="user-content-the-case" href="https://github.com/petersuhm/writings/blob/master/laravel-bdd-first-article.md#the-case" sl-processed="1"></a>The Case</h2>
<p>
	Throughout this series, starting from the next article, we will be building a system for tracking time. We will start by describing the behavior from the outside by writing Behat features. The internal behavior of our application will be described using PhpSpec.
</p>
<p>
	Together these two tools will help us feel comfortable with the quality of the application we are building. We will primarily write features and specs on three levels:
</p>
<ol>
	<li>Functional</li>
	<li>Integration</li>
	<li>Unit</li>
</ol>
<p>
	<br>
	In our functional suite, we will crawl the HTTP responses of our application in a headless mode, meaning that we will not go through the browser. This will make it easier to interact with Laravel and make our functional suite serve as our acceptance layer, as well.
</p>
<p>
	Later on, if we end up having a more complicated UI and might need to test some JavaScript as well, we might add a dedicated acceptance suite. This series is still work-in-progress, so feel free to drop your suggestions in the comments section.
</p>
<h2><a name="user-content-the-setup" href="https://github.com/petersuhm/writings/blob/master/laravel-bdd-first-article.md#the-setup" sl-processed="1"></a>Our Setup</h2>
<p>
	Note that for this tutorial, I assume you have a fresh install of Laravel (4.2) up and running. Preferably you are using Laravel Homestead as well, which is what I used when I wrote this code.
</p>
<p>
	Before we get started with any real work, let\'s make sure we have Behat and PhpSpec up and running. First though, I like to do a little bit of cleaning whenever I start a new laravel project and delete the stuff I do not need:
</p>
<table>
<tbody>
<tr>
	<td>
		1
	</td>
	<td>
		<code>git </code><code>rm</code> <code>-r app</code><code>/tests/</code> <code>phpunit.xml CONTRIBUTING.md</code>
	</td>
</tr>
</tbody>
</table>
<p>
	If you delete these files, make sure to update your <code>composer.json</code> file accordingly:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
		<p>
			7
		</p>
		<p>
			8
		</p>
		<p>
			9
		</p>
	</td>
	<td>
		<code>"autoload"</code><code>: {</code>
		<p>
			<code> </code><code>"classmap"</code><code>: [</code>
		</p>
		<p>
			<code> </code><code>"app/commands"</code><code>,</code>
		</p>
		<p>
			<code> </code><code>"app/controllers"</code><code>,</code>
		</p>
		<p>
			<code> </code><code>"app/models"</code><code>,</code>
		</p>
		<p>
			<code> </code><code>"app/database/migrations"</code><code>,</code>
		</p>
		<p>
			<code> </code><code>"app/database/seeds"</code>
		</p>
		<p>
			<code> </code><code>]</code>
		</p>
		<p>
			<code>},</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	And, of course:
</p>
<table>
<tbody>
<tr>
	<td>
		1
	</td>
	<td>
		<code>$ composer dump-autoload</code>
	</td>
</tr>
</tbody>
</table>
<p>
	Now we are ready to pull in the BDD tools we need. Just add a <code>require-dev</code> section to your <code>composer.json</code>:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
		<p>
			7
		</p>
		<p>
			8
		</p>
	</td>
	<td>
		<code>"require"</code><code>: {</code>
		<p>
			<code> </code><code>"laravel/framework"</code><code>: </code><code>"4.2.*"</code>
		</p>
		<p>
			<code>},</code>
		</p>
		<p>
			<code>"require-dev"</code><code>: {</code>
		</p>
		<p>
			<code> </code><code>"behat/behat"</code><code>: </code><code>"~3.0"</code><code>,</code>
		</p>
		<p>
			<code> </code><code>"phpspec/phpspec"</code><code>: </code><code>"~2.0"</code><code>,</code>
		</p>
		<p>
			<code> </code><code>"phpunit/phpunit"</code><code>: </code><code>"~4.1"</code>
		</p>
		<p>
			<code>},</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	"Why are we pulling in PHPUnit?" you might be thinking? We are not going to write good ol\' PHPUnit test cases in this series, but the assertions are a handy tool together with Behat. We will see that later in this article when we write our first feature.
</p>
<p>
	Remember to update you dependencies after modifying <code>composer.json</code>:
</p>
<table>
<tbody>
<tr>
	<td>
		1
	</td>
	<td>
		<code>$ composer update --dev</code>
	</td>
</tr>
</tbody>
</table>
<p>
	We are almost done installing and setting up stuff. PhpSpec works out of the box:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
	</td>
	<td>
		<code>$ vendor</code><code>/bin/phpspec</code> <code>run</code>
		<p>
			<code>0 specs</code>
		</p>
		<p>
			<code>0 examples </code>
		</p>
		<p>
			<code>0ms</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	But Behat needs to do a quick run with the <code>--init</code> option in order to set everything up:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
	</td>
	<td>
		<code>$ vendor</code><code>/bin/behat</code> <code>--init</code>
		<p>
			<code>+d features - place your *.feature files here</code>
		</p>
		<p>
			<code>+d features</code><code>/bootstrap</code> <code>- place your context classes here</code>
		</p>
		<p>
			<code>+f features</code><code>/bootstrap/FeatureContext</code><code>.php - place your definitions, transformations and hooks here</code>
		</p>
		<p>
			<code>$ vendor</code><code>/bin/behat</code>
		</p>
		<p>
			<code>No scenarios</code>
		</p>
		<p>
			<code>No steps</code>
		</p>
		<p>
			<code>0m0.14s (12.18Mb)</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	The first command created a shiny new <code>FeatureContext</code> class, where we can write the step definitions needed for our features:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
		<p>
			17
		</p>
		<p>
			18
		</p>
		<p>
			19
		</p>
		<p>
			20
		</p>
		<p>
			21
		</p>
	</td>
	<td>
		<code>&lt;?php</code>
		<p>
			<code>use</code> <code>Behat\Behat\Context\SnippetAcceptingContext;</code>
		</p>
		<p>
			<code>use</code> <code>Behat\Gherkin\Node\PyStringNode;</code>
		</p>
		<p>
			<code>use</code> <code>Behat\Gherkin\Node\TableNode;</code>
		</p>
		<p>
			<code>/**</code>
		</p>
		<p>
			<code> </code><code>* Behat context class.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>class</code> <code>FeatureContext </code><code>implements</code> <code>SnippetAcceptingContext</code>
		</p>
		<p>
			<code>{</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Initializes context.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* Every scenario gets its own context object.</code>
		</p>
		<p>
			<code> </code><code>* You can also pass arbitrary arguments to the context constructor through behat.yml.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>__construct()</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<h2>Writing Our First Feature</h2>
<p>
	Our first feature will be very simple: We will simply make sure that our new Laravel install greets us with a "You have arrived." on the homepage. I put in a rather silly <code>Given</code> step as well, <code>Given I am logged in</code>, which only serves to show how easy interacting with Laravel in our features is.
</p>
<p>
	Technically, I would categorize this type of feature as a functional test, since it interacts with the framework, but it also serves as an acceptance test, since we would not see any different results from running a similar test through a browser testing tool. For now we will stick with our functional test suite.
</p>
<p>
	Go ahead and create a <code>welcome.feature</code> file and put it in <code>features/functional</code>:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
	</td>
	<td>
		<code># features/functional/welcome.feature</code>
		<p>
			<code>Feature: Welcoming developer</code>
		</p>
		<p>
			<code> </code><code>As a Laravel developer</code>
		</p>
		<p>
			<code> </code><code>In order to proberly begin a new project</code>
		</p>
		<p>
			<code> </code><code>I need to be greeted upon arrival</code>
		</p>
		<p>
			<code> </code><code>Scenario: Greeting developer on homepage</code>
		</p>
		<p>
			<code> </code><code>Given I am logged in</code>
		</p>
		<p>
			<code> </code><code>When I visit "/"</code>
		</p>
		<p>
			<code> </code><code>Then I should see "You have arrived."</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	By putting the functional features in a <code>functional</code> directory, it will be easier for us to manage our suites later on. We do not want integration type features that does not require Laravel to have to wait for the slow functional suite.
</p>
<p>
	I like to keep things nice and clean, so I believe we should have a dedicated feature context for our functional suite that can give us access to Laravel. You can just go ahead and copy the existing <code>FeatureContext</code> file and change the class name to <code>LaravelFeatureContext</code>. For this to work, we also need a <code>behat.yml</code> configuration file.
</p>
<p>
	Create one in the root directory of you project and add the following:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
	</td>
	<td>
		<code>default:</code>
		<p>
			<code> </code><code>suites:</code>
		</p>
		<p>
			<code> </code><code>functional:</code>
		</p>
		<p>
			<code> </code><code>paths: [ %paths.base%/features/functional ]</code>
		</p>
		<p>
			<code> </code><code>contexts: [ LaravelFeatureContext ]</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	I think the YAML here is pretty self explanatory. Our functional suite will look for features in the <code>functional</code> directory and run them through the <code>LaravelFeatureContext</code>.
</p>
<p>
	If we try to run Behat at this point, it will tell us to implement the necessary step definitions. We can have Behat add the empty scaffold methods to the <code>LaravelFeatureContext</code> with the following command:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
		<p>
			17
		</p>
	</td>
	<td>
		<code>$ vendor</code><code>/bin/behat</code> <code>--dry-run --append-snippets</code>
		<p>
			<code>$ vendor</code><code>/bin/behat</code>
		</p>
		<p>
			<code>Feature: Welcoming developer</code>
		</p>
		<p>
			<code> </code><code>As a Laravel developer</code>
		</p>
		<p>
			<code> </code><code>In order to proberly begin a new project</code>
		</p>
		<p>
			<code> </code><code>I need to be greeted upon arival</code>
		</p>
		<p>
			<code> </code><code>Scenario: Greeting developer on homepage </code><code># features/functional/welcome.feature:6</code>
		</p>
		<p>
			<code> </code><code>Given I am logged </code><code>in</code> <code># LaravelFeatureContext::iAmLoggedIn()</code>
		</p>
		<p>
			<code> </code><code>TODO: write pending definition</code>
		</p>
		<p>
			<code> </code><code>When I visit </code><code>"/"</code> <code># LaravelFeatureContext::iVisit()</code>
		</p>
		<p>
			<code> </code><code>Then I should see </code><code>"You have arrived."</code> <code># LaravelFeatureContext::iShouldSee()</code>
		</p>
		<p>
			<code>1 scenario (1 pending)</code>
		</p>
		<p>
			<code>3 steps (1 pending, 2 skipped)</code>
		</p>
		<p>
			<code>0m0.28s (12.53Mb)</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	And now, as you can see from the output, we are ready to start implement the first of our steps: <code>Given I am logged in</code>.
</p>
<p>
	The PHPUnit test case that ships with Laravel allows us to do stuff like <code>$this-&gt;be($user)</code>, which logs in a given user. Ultimately, we want to be able to interact with Laravel as if we were using PHPUnit, so let\'s go ahead and write the step definition code "we wish we had":
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
		<p>
			7
		</p>
		<p>
			8
		</p>
		<p>
			9
		</p>
	</td>
	<td>
		<code>/**</code>
		<p>
			<code> </code><code>* @Given I am logged in</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>public</code> <code>function</code> <code>iAmLoggedIn()</code>
		</p>
		<p>
			<code>{</code>
		</p>
		<p>
			<code> </code><code>$user</code> <code>= </code><code>new</code> <code>User;</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;be(</code><code>$user</code><code>);</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	This will not work of course, since Behat have no idea about Laravel specific stuff, but I will show you in just a second how easy it is to get Behat and Laravel to play nicely together.
</p>
<p>
	If you take a look in the Laravel source and find the <code>Illuminate\Foundation\Testing\TestCase</code> class, which is the class that the default test case extends from, you will see that starting from Laravel 4.2, everything has been moved to a trait. The <code>ApplicationTrait</code> is now responsible for booting an <code>Application</code> instance, setting up an HTTP client and give us a few helper methods, such as <code>be()</code>.
</p>
<p>
	This is pretty cool, mainly because it means that we can just pull it in to our Behat contexts with almost no setup required. We also have access to the <code>AssertionsTrait</code>, but this is still tied to PHPUnit.
</p>
<p>
	When we pull in the trait, we need to do two things. We need to have a <code>setUp()</code> method, like the one in the<code>Illuminate\Foundation\Testing\TestCase</code> class, and we need a <code>createApplication()</code> method, like the one in the default Laravel test case. Actually we can just copy those two methods and use them directly.
</p>
<p>
	There is only one thing to notice: In PHPUnit, the method <code>setUp()</code> will automatically be called before each test. In order to achieve the same in Behat, we can use the <code>@BeforeScenario</code> annotation.
</p>
<p>
	Add the following to your <code>LaravelFeatureContext</code>:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
		<p>
			17
		</p>
		<p>
			18
		</p>
		<p>
			19
		</p>
		<p>
			20
		</p>
		<p>
			21
		</p>
		<p>
			22
		</p>
		<p>
			23
		</p>
		<p>
			24
		</p>
		<p>
			25
		</p>
		<p>
			26
		</p>
		<p>
			27
		</p>
		<p>
			28
		</p>
		<p>
			29
		</p>
		<p>
			30
		</p>
		<p>
			31
		</p>
		<p>
			32
		</p>
		<p>
			33
		</p>
		<p>
			34
		</p>
		<p>
			35
		</p>
		<p>
			36
		</p>
		<p>
			37
		</p>
		<p>
			38
		</p>
		<p>
			39
		</p>
		<p>
			40
		</p>
		<p>
			41
		</p>
		<p>
			42
		</p>
		<p>
			43
		</p>
		<p>
			44
		</p>
		<p>
			45
		</p>
		<p>
			46
		</p>
	</td>
	<td>
		<code>use</code> <code>Illuminate\Foundation\Testing\ApplicationTrait;</code>
		<p>
			<code>/**</code>
		</p>
		<p>
			<code> </code><code>* Behat context class.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>class</code> <code>LaravelFeatureContext </code><code>implements</code> <code>SnippetAcceptingContext</code>
		</p>
		<p>
			<code>{</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Responsible for providing a Laravel app instance.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>use</code> <code>ApplicationTrait;</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Initializes context.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* Every scenario gets its own context object.</code>
		</p>
		<p>
			<code> </code><code>* You can also pass arbitrary arguments to the context constructor through behat.yml.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>__construct()</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* @BeforeScenario</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>setUp()</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>if</code> <code>( ! </code><code>$this</code><code>-&gt;app)</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;refreshApplication();</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Creates the application.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @return \Symfony\Component\HttpKernel\HttpKernelInterface</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>createApplication()</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>$unitTesting</code> <code>= true;</code>
		</p>
		<p>
			<code> </code><code>$testEnvironment</code> <code>= </code><code>\'testing\'</code><code>;</code>
		</p>
		<p>
			<code> </code><code>return</code> <code>require</code> <code>__DIR__.</code><code>\'/../../bootstrap/start.php\'</code><code>;</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	Pretty easy, and look what we get when we run Behat:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
	</td>
	<td>
		<code>$ vendor</code><code>/bin/behat</code>
		<p>
			<code>Feature: Welcoming developer</code>
		</p>
		<p>
			<code> </code><code>As a Laravel developer</code>
		</p>
		<p>
			<code> </code><code>In order to proberly begin a new project</code>
		</p>
		<p>
			<code> </code><code>I need to be greeted upon arival</code>
		</p>
		<p>
			<code> </code><code>Scenario: Greeting developer on homepage </code><code># features/functional/welcome.feature:6</code>
		</p>
		<p>
			<code> </code><code>Given I am logged </code><code>in</code> <code># LaravelFeatureContext::iAmLoggedIn()</code>
		</p>
		<p>
			<code> </code><code>When I visit </code><code>"/"</code> <code># LaravelFeatureContext::iVisit()</code>
		</p>
		<p>
			<code> </code><code>TODO: write pending definition</code>
		</p>
		<p>
			<code> </code><code>Then I should see </code><code>"You have arrived."</code> <code># LaravelFeatureContext::iShouldSee()</code>
		</p>
		<p>
			<code>1 scenario (1 pending)</code>
		</p>
		<p>
			<code>3 steps (1 passed, 1 pending, 1 skipped)</code>
		</p>
		<p>
			<code>0m0.73s (17.92Mb)</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	A green first step, which means that our setup is working!
</p>
<p>
	Next up, we can implement the <code>When I visit</code> step. This one is super easy, and we can simply use the <code>call()</code>method that the <code>ApplicationTrait</code> provides. One line of code will get us there:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
		<p>
			7
		</p>
	</td>
	<td>
		<code>/**</code>
		<p>
			<code> </code><code>* @When I visit :uri</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>public</code> <code>function</code> <code>iVisit(</code><code>$uri</code><code>)</code>
		</p>
		<p>
			<code>{</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;call(</code><code>\'GET\'</code><code>, </code><code>$uri</code><code>);</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	The last step, <code>Then I should see</code>, takes a little more and we need to pull in two dependencies. We will need PHPUnit for the assertion and we will need the Symfony DomCrawler to search for the "You have arrived." text.
</p>
<p>
	We can implement it like this:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
	</td>
	<td>
		<code>use</code> <code>PHPUnit_Framework_Assert </code><code>as</code> <code>PHPUnit;</code>
		<p>
			<code>use</code> <code>Symfony\Component\DomCrawler\Crawler;</code>
		</p>
		<p>
			<code>...</code>
		</p>
		<p>
			<code>/**</code>
		</p>
		<p>
			<code> </code><code>* @Then I should see :text</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>public</code> <code>function</code> <code>iShouldSee(</code><code>$text</code><code>)</code>
		</p>
		<p>
			<code>{</code>
		</p>
		<p>
			<code> </code><code>$crawler</code> <code>= </code><code>new</code> <code>Crawler(</code><code>$this</code><code>-&gt;client-&gt;getResponse()-&gt;getContent());</code>
		</p>
		<p>
			<code> </code><code>PHPUnit::assertCount(1, </code><code>$crawler</code><code>-&gt;filterXpath(</code><code>"//text()[. = \'{$text}\']"</code><code>));</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	This is pretty much the same code as you would write if you were using PHPUnit. The <code>filterXpath()</code> part is a little confusing and we will not worry about it now, since it is a little out of the scope of this article. Just trust me that it works.
</p>
<p>
	Running Behat one final time is good news:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
	</td>
	<td>
		<code>$ vendor</code><code>/bin/behat</code>
		<p>
			<code>Feature: Welcoming developer</code>
		</p>
		<p>
			<code> </code><code>As a Laravel developer</code>
		</p>
		<p>
			<code> </code><code>In order to proberly begin a new project</code>
		</p>
		<p>
			<code> </code><code>I need to be greeted upon arival</code>
		</p>
		<p>
			<code> </code><code>Scenario: Greeting developer on homepage </code><code># features/functional/welcome.feature:6</code>
		</p>
		<p>
			<code> </code><code>Given I am logged </code><code>in</code> <code># LaravelFeatureContext::iAmLoggedIn()</code>
		</p>
		<p>
			<code> </code><code>When I visit </code><code>"/"</code> <code># LaravelFeatureContext::iVisit()</code>
		</p>
		<p>
			<code> </code><code>Then I should see </code><code>"You have arrived."</code> <code># LaravelFeatureContext::iShouldSee()</code>
		</p>
		<p>
			<code>1 scenario (1 passed)</code>
		</p>
		<p>
			<code>3 steps (3 passed)</code>
		</p>
		<p>
			<code>0m0.82s (19.46Mb)</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	The feature is working as expected and the developer is greeted upon arrival.
</p>
<h2><a name="user-content-conclusion" href="https://github.com/petersuhm/writings/blob/master/laravel-bdd-first-article.md#conclusion" sl-processed="1"></a>Conclusion</h2>
<p>
	The complete <code>LaravelFeatureContext</code> should now look similar to this:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
		<p>
			17
		</p>
		<p>
			18
		</p>
		<p>
			19
		</p>
		<p>
			20
		</p>
		<p>
			21
		</p>
		<p>
			22
		</p>
		<p>
			23
		</p>
		<p>
			24
		</p>
		<p>
			25
		</p>
		<p>
			26
		</p>
		<p>
			27
		</p>
		<p>
			28
		</p>
		<p>
			29
		</p>
		<p>
			30
		</p>
		<p>
			31
		</p>
		<p>
			32
		</p>
		<p>
			33
		</p>
		<p>
			34
		</p>
		<p>
			35
		</p>
		<p>
			36
		</p>
		<p>
			37
		</p>
		<p>
			38
		</p>
		<p>
			39
		</p>
		<p>
			40
		</p>
		<p>
			41
		</p>
		<p>
			42
		</p>
		<p>
			43
		</p>
		<p>
			44
		</p>
		<p>
			45
		</p>
		<p>
			46
		</p>
		<p>
			47
		</p>
		<p>
			48
		</p>
		<p>
			49
		</p>
		<p>
			50
		</p>
		<p>
			51
		</p>
		<p>
			52
		</p>
		<p>
			53
		</p>
		<p>
			54
		</p>
		<p>
			55
		</p>
		<p>
			56
		</p>
		<p>
			57
		</p>
		<p>
			58
		</p>
		<p>
			59
		</p>
		<p>
			60
		</p>
		<p>
			61
		</p>
		<p>
			62
		</p>
		<p>
			63
		</p>
		<p>
			64
		</p>
		<p>
			65
		</p>
		<p>
			66
		</p>
		<p>
			67
		</p>
		<p>
			68
		</p>
		<p>
			69
		</p>
		<p>
			70
		</p>
		<p>
			71
		</p>
		<p>
			72
		</p>
		<p>
			73
		</p>
		<p>
			74
		</p>
		<p>
			75
		</p>
		<p>
			76
		</p>
		<p>
			77
		</p>
		<p>
			78
		</p>
		<p>
			79
		</p>
		<p>
			80
		</p>
		<p>
			81
		</p>
		<p>
			82
		</p>
		<p>
			83
		</p>
		<p>
			84
		</p>
	</td>
	<td>
		<code>&lt;?php</code>
		<p>
			<code>use</code> <code>Behat\Behat\Context\SnippetAcceptingContext;</code>
		</p>
		<p>
			<code>use</code> <code>Behat\Gherkin\Node\PyStringNode;</code>
		</p>
		<p>
			<code>use</code> <code>Behat\Gherkin\Node\TableNode;</code>
		</p>
		<p>
			<code>use</code> <code>PHPUnit_Framework_Assert </code><code>as</code> <code>PHPUnit;</code>
		</p>
		<p>
			<code>use</code> <code>Symfony\Component\DomCrawler\Crawler;</code>
		</p>
		<p>
			<code>use</code> <code>Illuminate\Foundation\Testing\ApplicationTrait;</code>
		</p>
		<p>
			<code>/**</code>
		</p>
		<p>
			<code> </code><code>* Behat context class.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>class</code> <code>LaravelFeatureContext </code><code>implements</code> <code>SnippetAcceptingContext</code>
		</p>
		<p>
			<code>{</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Responsible for providing a Laravel app instance.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>use</code> <code>ApplicationTrait;</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Initializes context.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* Every scenario gets its own context object.</code>
		</p>
		<p>
			<code> </code><code>* You can also pass arbitrary arguments to the context constructor through behat.yml.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>__construct()</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* @BeforeScenario</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>setUp()</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>if</code> <code>( ! </code><code>$this</code><code>-&gt;app)</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;refreshApplication();</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Creates the application.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @return \Symfony\Component\HttpKernel\HttpKernelInterface</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>createApplication()</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>$unitTesting</code> <code>= true;</code>
		</p>
		<p>
			<code> </code><code>$testEnvironment</code> <code>= </code><code>\'testing\'</code><code>;</code>
		</p>
		<p>
			<code> </code><code>return</code> <code>require</code> <code>__DIR__.</code><code>\'/../../bootstrap/start.php\'</code><code>;</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* @Given I am logged in</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>iAmLoggedIn()</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>$user</code> <code>= </code><code>new</code> <code>User;</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;be(</code><code>$user</code><code>);</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* @When I visit :uri</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>iVisit(</code><code>$uri</code><code>)</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;call(</code><code>\'GET\'</code><code>, </code><code>$uri</code><code>);</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* @Then I should see :text</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>iShouldSee(</code><code>$text</code><code>)</code>
		</p>
		<p>
			<code> </code><code>{</code>
		</p>
		<p>
			<code> </code><code>$crawler</code> <code>= </code><code>new</code> <code>Crawler(</code><code>$this</code><code>-&gt;client-&gt;getResponse()-&gt;getContent());</code>
		</p>
		<p>
			<code> </code><code>PHPUnit::assertCount(1, </code><code>$crawler</code><code>-&gt;filterXpath(</code><code>"//text()[. = \'{$text}\']"</code><code>));</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	We now have a really nice foundation to build upon as we continue developing our new Laravel application using BDD. I hope I have proven to you how easy it is to get Laravel and Behat to play nicely together.
</p>
<p>
	We have touched on a lot of different topics in this first article. No need to worry, we will take a more in-depth look at everything as the series continues. If you have any questions or suggestions, please leave a comment.
</p>';

protected $excerpt4 = 'When it comes to design patterns, you may have questions:Why should we use design patterns in programming? Our code can work just fine without it.To that, my counter question would be: "Would you rather live in a luxurious home, or in a simple establishment with four walls?" After all, both serve our purpose.Generally, we look for a luxurious home because it offers better facilities and requires less maintenance, and maintenance can done with less hassle because the basic groundwork is already there. The same thing applies to programming: Code that employs design patterns is easy to understand, easy to maintain,...';

protected $content4 = '<p>
	In this series, we\'re walking through how to create maintainable WordPress meta boxes. That is, we\'re looking at some best practices that we can employ in our WordPress development to make sure that we\'re writing code that\'s maintainable by ourselves or by our team, as it continues to evolve over time.
</p>
<p>
	<a href="http://code.tutsplus.com/tutorials/creating-maintainable-wordpress-meta-boxes--cms-22189" target="_blank" sl-processed="1">In the first post</a>, we looked at the initial directory structure and setup the basic code required to get a plugin running in WordPress. In this post, we\'re going to continue planning and building our plugin.
</p>
<p>
	We\'ll also be talking about the decisions that we\'re making when it comes to separating parts of our code and how it factors into maintainability.
</p>
<h2>Planning <i>Author\'s Commentary</i></h2>
<p>
	In the previous post, we started working on a plugin called <i>Author\'s Commentary</i>. The idea behind the plugin is that it will allow post authors to leave various notes and assets associated with the post that were used either as inspiration, as thoughts <i></i>after the post was written and received, and other similar information.
</p>
<p>
	When writing a post, let\'s say that we want to capture three specific pieces of information:
</p>
<ol>
	<li>Notes used when preparing the post</li>
	<li>Assets and resources used throughout the post</li>
	<li>Tweets and links to comments and feedback after the publication</li>
</ol>
<p>
	To be clear, we want to have a way to maintain the notes that went into creating the post before it was written, links to various assets - be it external articles, images, videos, code samples, and so on - and then maintain a list of tweets, links to comments, and various snippets from emails we\'ve received.
</p>
<p>
	At this point, we have enough to go on in order to begin preparing the meta box and the tabbed layout for it.
</p>
<h3>The Meta Box Tabs</h3>
<p>
	Before we actually begin writing any code, let\'s name the tabs that will be associated with each of the states of our post as listed above. Doing this will help us conceptually organize our input elements so they are logically grouped together.
</p>
<p>
	Granted, you can name these anything you\'d like, but if you\'re following along with this tutorial and the provided source code, then this is what you can expect to see.
</p>
<ol>
	<li>The first tab will be called <i>Draft</i> as it will contain all of the bullet points, sentences, and other notes that went into preparing the post.</li>
	<li>The second tab will be called <i>Resources</i> as it will include information on other posts, links, videos, and so on that we may refer to in our post or that we may embed in our post.</li>
	<li>The final tab will be called <i>Published </i>as it will contain links to comments, fields for email, and other information all of which are relevant to the post after it has been published.</li>
</ol>
<p>
	Straightforward enough, isn\'t it? We\'ll talk more about the input elements for each tab once we get to that point in the code, but for now we need to focus on creating the meta box and implementing the tabs.
</p>
<h2>Creating The Meta Box</h2>
<p>
	To create the meta box, we\'ll take advantage of <a href="http://codex.wordpress.org/Function_Reference/add_meta_box" rel="external" target="_blank" sl-processed="1">the <code>add_meta_box</code> function</a> as documented in the WordPress Codex. To do this, we\'re going to be introducing a new class, updating the plugin\'s bootstrap file, and introducing some views that will be used to render markup in the browser.
</p>
<h3>The Meta Box Class</h3>
<p>
	In order to make sure our code is well-encapsulated and that each class represents a single idea, we\'re going to create an <code>Authors_Commentary_Meta_Box</code> class. This class will be responsible for registering a hook with the <code>add_meta_box</code> action, setting up the meta box, and rendering its content.
</p>
<p>
	For those who aren\'t use to writing plugins in an object-oriented manner with WordPress, this approach allows us to segment our areas of responsibility - such as a meta box - and have a single class representing all that goes into creating one.
</p>
<p>
	To do this, first create <code>class-authors-commentary-meta-box.php</code> in the admin directory. Next, add the following code:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
		<p>
			16
		</p>
		<p>
			17
		</p>
		<p>
			18
		</p>
		<p>
			19
		</p>
		<p>
			20
		</p>
		<p>
			21
		</p>
		<p>
			22
		</p>
		<p>
			23
		</p>
		<p>
			24
		</p>
		<p>
			25
		</p>
		<p>
			26
		</p>
		<p>
			27
		</p>
		<p>
			28
		</p>
		<p>
			29
		</p>
		<p>
			30
		</p>
		<p>
			31
		</p>
		<p>
			32
		</p>
		<p>
			33
		</p>
		<p>
			34
		</p>
		<p>
			35
		</p>
		<p>
			36
		</p>
		<p>
			37
		</p>
		<p>
			38
		</p>
		<p>
			39
		</p>
		<p>
			40
		</p>
		<p>
			41
		</p>
		<p>
			42
		</p>
		<p>
			43
		</p>
		<p>
			44
		</p>
		<p>
			45
		</p>
		<p>
			46
		</p>
		<p>
			47
		</p>
		<p>
			48
		</p>
		<p>
			49
		</p>
		<p>
			50
		</p>
		<p>
			51
		</p>
		<p>
			52
		</p>
		<p>
			53
		</p>
		<p>
			54
		</p>
		<p>
			55
		</p>
		<p>
			56
		</p>
		<p>
			57
		</p>
		<p>
			58
		</p>
		<p>
			59
		</p>
		<p>
			60
		</p>
	</td>
	<td>
		<code>&lt;?php</code>
		<p>
			<code>/**</code>
		</p>
		<p>
			<code> </code><code>* Represents the Author\'s Commentary Meta Box.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @link &lt;a href="http://code.tutsplus.com/tutorials/creating-maintainable-wordpress-meta-boxes-the-layout--cms-22208" sl-processed="1"&gt;http://code.tutsplus.com/tutorials/creating-maintainable-wordpress-meta-boxes-the-layout--cms-22208&lt;/a&gt;</code>
		</p>
		<p>
			<code> </code><code>* @since 0.2.0</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @package Author_Commentary</code>
		</p>
		<p>
			<code> </code><code>* @subpackage Author_Commentary/admin</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>/**</code>
		</p>
		<p>
			<code> </code><code>* Represents the Author\'s Commentary Meta Box.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* Registers the meta box with the WordPress API, sets its properties, and renders the content</code>
		</p>
		<p>
			<code> </code><code>* by including the markup from its associated view.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @package Author_Commentary</code>
		</p>
		<p>
			<code> </code><code>* @subpackage Author_Commentary/admin</code>
		</p>
		<p>
			<code> </code><code>* @author Tom McFarlin &lt;tom@tommcfarlin.com&gt;</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>class</code> <code>Authors_Commentary_Meta_Box {</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Register this class with the WordPress API</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @since 0.2.0</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>__construct() {</code>
		</p>
		<p>
			<code> </code><code>add_action( </code><code>\'add_meta_boxes\'</code><code>, </code><code>array</code><code>( </code><code>$this</code><code>, </code><code>\'add_meta_box\'</code> <code>) );</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* The function responsible for creating the actual meta box.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @since 0.2.0</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>add_meta_box() {</code>
		</p>
		<p>
			<code> </code><code>add_meta_box(</code>
		</p>
		<p>
			<code> </code><code>\'authors-commentary\'</code><code>,</code>
		</p>
		<p>
			<code> </code><code>"Author\'s Commentary"</code><code>,</code>
		</p>
		<p>
			<code> </code><code>array</code><code>( </code><code>$this</code><code>, </code><code>\'display_meta_box\'</code> <code>),</code>
		</p>
		<p>
			<code> </code><code>\'post\'</code><code>,</code>
		</p>
		<p>
			<code> </code><code>\'normal\'</code><code>,</code>
		</p>
		<p>
			<code> </code><code>\'default\'</code>
		</p>
		<p>
			<code> </code><code>);</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code> </code><code>/**</code>
		</p>
		<p>
			<code> </code><code>* Renders the content of the meta box.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @since 0.2.0</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code> </code><code>public</code> <code>function</code> <code>display_meta_box() {</code>
		</p>
		<p>
			<code> </code><code>}</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	The comments and the content of the class should make it relatively easy to understand. It does three things, but to be clear:
</p>
<ol>
	<li>The constructor registers the <code>add_meta_box</code> function with the corresponding WordPress action.</li>
	<li>The <code>add_meta_box</code> function defines the properties of the meta box.</li>
	<li>The <code>display_meta_box</code> function doesn\'t do anything yet - we\'ll be working on this momentarily.</li>
</ol>
<p>
	Before we move on, there are a few changes we need to introduce to the rest of the plugin.
</p>
<p>
	First, we need to include this new file in the plugin\'s bootstrap file. In <code>authors-commentary.php</code>, add the following line of code above the current <code>require_once</code>statement:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
	</td>
	<td>
		<code>/**</code>
		<p>
			<code> </code><code>* The class that represents the meta box that will dispaly the navigation tabs and each of the</code>
		</p>
		<p>
			<code> </code><code>* fields for the meta box.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>require_once</code> <code>plugin_dir_path( </code><code>__FILE__</code> <code>) . </code><code>\'admin/class-authors-commentary-meta-box.php\'</code><code>;</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	We add this line above the initial code because the initial code depends on this particular file to run; therefore, it has to be loaded first.
</p>
<p>
	Next, we need to introduce a new property in side of <code>admin/class-authors-commentary.php</code> that will refer to an instance of the meta box:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
		<p>
			7
		</p>
		<p>
			8
		</p>
	</td>
	<td>
		<code>/**</code>
		<p>
			<code> </code><code>* A reference to the meta box.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @since 0.2.0</code>
		</p>
		<p>
			<code> </code><code>* @access private</code>
		</p>
		<p>
			<code> </code><code>* @var Authors_Commentary_Meta_Box $meta_box A reference to the meta box for the plugin.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>private</code> <code>$meta_box</code><code>;</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	Finally, we need to instantiate the code in the constructor of the class:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
	</td>
	<td>
		<code>/**</code>
		<p>
			<code> </code><code>* Initialize the class and set its properties.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @since 0.1.0</code>
		</p>
		<p>
			<code> </code><code>* @var string $name The name of this plugin.</code>
		</p>
		<p>
			<code> </code><code>* @var string $version The version of this plugin.</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>public</code> <code>function</code> <code>__construct( </code><code>$name</code><code>, </code><code>$version</code> <code>) {</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;name = </code><code>$name</code><code>;</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;version = </code><code>$version</code><code>;</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;meta_box = </code><code>new</code> <code>Authors_Commentary_Meta_Box();</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	At this point, you should be able to activate the plugin, navigate to a post page, and see an empty meta box:
</p>
<img alt="" src="https://cms-assets.tutsplus.com/uploads/users/34/posts/22208/image/empty-meta-box.png">
<p>
	Nothing too exciting, but we have what we need in order to begin introducing our tabbed navigation.
</p>
<h3>Adding Tabs</h3>
<p>
	At this point, we\'re ready to introduce the tabbed navigation portion of the meta box. Ultimately, our goal is to introduce the markup and styles for the tab in this post, and then implement the behavior an the elements in the next post in the series.
</p>
<p>
	With that said, let\'s first create a <code>views</code> subdirectory within the <code>admin</code> directory. Technically, we did this in the previous article; however, we didn\'t have content in the directory so it wasn\'t checked into source control (thus, the directory was not added - so if you\'re following along with the repository, now\'s the time to create the directory).
</p>
<p>
	Next, create a file within the views directory called <code>authors-commentary-navigation.php</code>. This file will primarily serve as markup; however, it will include a little bit of PHP by the time we\'re doing with this plugin.
</p>
<p>
	Add the following code to the file. We\'ll discuss it more in-depth after the block of code:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
		<p>
			4
		</p>
		<p>
			5
		</p>
		<p>
			6
		</p>
		<p>
			7
		</p>
	</td>
	<td>
		<code>&lt;</code><code>div</code> <code>id</code><code>=</code><code>"authors-commentary-navigation"</code><code>&gt;</code>
		<p>
			<code> </code><code>&lt;</code><code>h2</code> <code>class</code><code>=</code><code>"nav-tab-wrapper current"</code><code>&gt;</code>
		</p>
		<p>
			<code> </code><code>&lt;</code><code>a</code> <code>class</code><code>=</code><code>"nav-tab nav-tab-active"</code> <code>href</code><code>=</code><code>"javascript:;"</code><code>&gt;Draft&lt;/</code><code>a</code><code>&gt;</code>
		</p>
		<p>
			<code> </code><code>&lt;</code><code>a</code> <code>class</code><code>=</code><code>"nav-tab"</code> <code>href</code><code>=</code><code>"javascript:;"</code><code>&gt;Resources&lt;/</code><code>a</code><code>&gt;</code>
		</p>
		<p>
			<code> </code><code>&lt;</code><code>a</code> <code>class</code><code>=</code><code>"nav-tab"</code> <code>href</code><code>=</code><code>"javascript:;"</code><code>&gt;Published&lt;/</code><code>a</code><code>&gt;</code>
		</p>
		<p>
			<code> </code><code>&lt;/</code><code>h2</code><code>&gt;</code>
		</p>
		<p>
			<code>&lt;/</code><code>div</code><code>&gt;</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	Once done, insert the following code into Authors_Commentary_Meta_Box, add the following code to import this particular piece of markup:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
	</td>
	<td>
		<code>&lt;?php</code>
		<p>
			<code>/**</code>
		</p>
		<p>
			<code> </code><code>* Renders the content of the meta box.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @since 0.2.0</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>public</code> <code>function</code> <code>display_meta_box() {</code>
		</p>
		<p>
			<code> </code><code>include_once</code><code>( </code><code>\'views/authors-commentary-navigation.php\'</code> <code>);</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	Aside from the <code>div</code> container that we have, notice the following:
</p>
<ul>
	<li>We\'ve wrapped three anchors in an <code>h2</code> element. The <code>h2</code> element contains class attributes of <code>nav-tab-wrapper</code> and <code>current</code>. This allows for us to inherit styles directly from WordPress without doing anything on our part.</li>
	<li>Each anchor has a <code>nav-tab</code> class the first of which has the <code>nav-tab-active</code>class. This again gives us a bit of styling from which we inherit from WordPress.</li>
	<li>Each anchor also has the <code>href</code> attribute of <code>javascript:;</code> because the anchors aren\'t actually going to be taking us anywhere. Instead, in a future tutorial, we\'ll be using JavaScript to control the tabs and the content that\'s displayed within each one.</li>
</ul>
<p>
	At this point, you should see the following:
</p>
<img alt="" src="https://cms-assets.tutsplus.com/uploads/users/34/posts/22208/image/meta-box-tabs.png">
<p>
	Notice that all of the styles that are applied to the tabs have been provided by WordPress. The only thing that you may want to tweak is the margin that exists between the tabs and the horizontal line below them.
</p>
<p>
	Let\'s do that now.
</p>
<h3>Including a Stylesheet</h3>
<p>
	In the <code>admin</code> directory, add another subdirectory called <code>assets</code> and within it a directory called <code>css</code>. Next, create an empty file called <code>admin.css</code>.
</p>
<p>
	After that, include the following lines in the CSS file:
</p>
<table>
<tbody>
<tr>
	<td>
		1
		<p>
			2
		</p>
		<p>
			3
		</p>
	</td>
	<td>
		<code>a.nav-tab {</code>
		<p>
			<code> </code><code>margin-bottom</code><code>: </code><code>-4px</code><code>;</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	Then be sure to include the following call in the constructor of <code>class-authors-commentary.php</code>:
</p>
<table>
<tbody>
<tr>
	<td>
		1
	</td>
	<td>
		<code>add_action( </code><code>\'admin_enqueue_scripts\'</code><code>, </code><code>array</code><code>( </code><code>$this</code><code>, </code><code>\'enqueue_admin_styles\'</code> <code>) );</code>
	</td>
</tr>
</tbody>
</table>
<p>
	Finally, add the following function - it\'s responsible for enqueuing the actual stylesheet:
</p>
<table>
<tbody>
<tr>
	<td>
		01
		<p>
			02
		</p>
		<p>
			03
		</p>
		<p>
			04
		</p>
		<p>
			05
		</p>
		<p>
			06
		</p>
		<p>
			07
		</p>
		<p>
			08
		</p>
		<p>
			09
		</p>
		<p>
			10
		</p>
		<p>
			11
		</p>
		<p>
			12
		</p>
		<p>
			13
		</p>
		<p>
			14
		</p>
		<p>
			15
		</p>
	</td>
	<td>
		<code>/**</code>
		<p>
			<code> </code><code>* Enqueues all files specifically for the dashboard.</code>
		</p>
		<p>
			<code> </code><code>*</code>
		</p>
		<p>
			<code> </code><code>* @since 0.2.0</code>
		</p>
		<p>
			<code> </code><code>*/</code>
		</p>
		<p>
			<code>public</code> <code>function</code> <code>enqueue_admin_styles() {</code>
		</p>
		<p>
			<code> </code><code>wp_enqueue_style(</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;name . </code><code>\'-admin\'</code><code>,</code>
		</p>
		<p>
			<code> </code><code>plugins_url( </code><code>\'authors-commentary/admin/assets/css/admin.css\'</code> <code>),</code>
		</p>
		<p>
			<code> </code><code>false,</code>
		</p>
		<p>
			<code> </code><code>$this</code><code>-&gt;version</code>
		</p>
		<p>
			<code> </code><code>);</code>
		</p>
		<p>
			<code>}</code>
		</p>
	</td>
</tr>
</tbody>
</table>
<p>
	At this point, it should look much cleaner:
</p>
<img alt="" src="https://cms-assets.tutsplus.com/uploads/users/34/posts/22208/image/meta-box-tabs-improved.png">
<p>
	With that done, we\'ve completed everything that we need to do for the basic foundation of the navigation tabs for our meta box.
</p>
<h2>Preparing To Move Forward</h2>
<p>
	In the next article, we\'re going to introduce the content for each tab and we\'re going to work through the JavaScript that\'s necessary to toggle the tabs and each of their content.
</p>
<p>
	For those who are more experienced with WordPress, this series of articles may feel like it\'s moving at a slower pace, but that\'s the point - we\'re looking to be as exhaustive as possible when it comes not only to building our user interface, but also in explaining the rationale behind each of our decisions.
</p>
<p>
	In the meantime, don\'t forget to checkout the source code on GitHub, follow along, and leave any questions or comments in the feed below.
</p>';

    public function run()
    {
        DB::table('posts')->delete();

        DB::table('posts')->insert( array(
            array(
				'post_author'  => 1,
				'post_title'   => 'Design Patterns: The Facade Pattern',
				'post_slug'    => 'design-patterns-the-facade-pattern',
				'post_excerpt' => $this->excerpt1,
				'post_content' => $this->content1,
				'created_at'   => new DateTime()
            ),
            array(
				'post_author'  => 1,
				'post_title'   => 'Creating A Mini-CSS Preprocesser For Theme Color Options',
				'post_slug'    => 'creating-a-mini-css-preprocesser-for-theme-color-options',
				'post_excerpt' => $this->excerpt2,
				'post_content' => $this->content2,
				'created_at'   => new DateTime()
            ),
            array(
				'post_author'  => 2,
				'post_title'   => 'Laravel, Bdd And You: Let\'s Get Started',
				'post_slug'    => 'laravel-bdd-and-you-let\'s-get-started',
				'post_excerpt' => $this->excerpt3,
				'post_content' => $this->content3,
				'created_at'   => new DateTime()
            ),
            array(
				'post_author'  => 2,
				'post_title'   => 'Creating Maintainable WordPress Meta Boxes: The Layout',
				'post_slug'    => 'creating-maintainable-wordpress-meta-boxes-the-layout',
				'post_excerpt' => $this->excerpt4,
				'post_content' => $this->content4,
				'created_at'   => new DateTime()
            ))
        );
    }

}
