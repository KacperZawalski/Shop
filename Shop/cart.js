var displayCart = document.createElement("div");
class CartContents 
{
    divId = 0;
    constructor(divId, dbId, quantity)
    {
        this.divId = divId;
        this.dbId = dbId;
        this.quantity = quantity;
    }
}
class Cart 
{
    content = [];
    newCartItem;
    paramConstructor(cart)
    {
        this.content = cart.content;
    }
    addToCart(divId, dbId, quantity)
    {
        this.newCartItem = new CartContents(divId, dbId, quantity);
        this.removeDuplicates();
        this.saveCart();
    }
    createList()
    {
        var cartContent = "";
        for (var i = 0; i < this.content.length; i++)
        {
            cartContent += "dbId: " + this.content[i].dbId + " " + "Quantity: " + this.content[i].quantity + " ";
        }
        displayCart.innerHTML = cartContent;
        document.getElementById("cartList").appendChild(displayCart);
    }
    findItemInCart(dbId)
    {
        for (var i = 0; i < this.content.length; i++) 
        {
            if (this.content[i].dbId == dbId)
            {
                return this.content[i];
            }
        }
    }
    removeDuplicates()
    {
        var temp = this.findItemInCart(this.newCartItem.dbId);
        if (temp)
        {
            temp.quantity += this.newCartItem.quantity;
        }
        else
        {
            this.content.push(this.newCartItem);
        }
    }
    saveCart()
    {
        var temp = JSON.stringify(this);
        sessionStorage.setItem("cart", temp);
    }
    retrieveCart()
    {
        var temp = sessionStorage.getItem("cart");
        return JSON.parse(temp);
    }
}
var cart = new Cart();

if (cart.retrieveCart())
{
    cart.paramConstructor(cart.retrieveCart());
}
