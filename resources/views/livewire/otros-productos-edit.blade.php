<div>



    <div class="card">
        <div class="card-header">
            Otros
        </div>

        <div class="card-body">
            <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                  
                       
                   

        
                  
                  

                    @foreach ($orderProducts as $index => $orderProduct)
                        <tr>

                            <td>
                                <select name="orderProducts[{{ $index }}][producto_id]"
                                    wire:model="orderProducts.{{ $index }}.producto_id" class="form-control">
                                    <option value="">-- Escoger producto --</option>
                                    @foreach ($allProducts as $product)

                              
                                       
                                            <option value="{{ $product->id }}" selected>
                                                
                                                {{ $product->nombre }} 
                                            </option>   
                                      
                                     
                                    @endforeach
                                </select>
                            </td>
                          
                            <td>
                               
                                <input type="number" name="orderProducts[{{ $index }}][quantity]"
                                    class="form-control" wire:model="orderProducts.{{ $index }}.quantity">
                                   
                                </input>

                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeProduct({{ $index }})"
                                    class="btn btn-sm btn-danger">- Eliminar</a>
                            </td>
                        </tr>
                    @endforeach

              
                </tbody>
            </table>

            <div class="row">


                <div class="col-md-12">
                    <button class="btn btn-sm btn-primary" wire:click.prevent="addProduct">+ Agregar otro</button>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div>
        <input class="btn btn-success btn-sm"  style="background: green; width: 30%; padding: 10px; align-content: right;" type="submit" value="Guardar">
    </div>


</div>
