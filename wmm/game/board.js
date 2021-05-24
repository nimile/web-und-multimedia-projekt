import meta from "./constants.js"

class Board{
    #field = []

    /**
     * This class defines the game board.
     * The board contains 
     * - an array of every block
     * - width and height of the field
     * - methods to operate on the field
     * 
     * @version 1.1
     * @date Mai 01 2020
     */
    constructor(){     
        for(var x = 0; x < meta.BOARD_WIDTH; x++){
            for(var y = 0; y < meta.BOARD_HEIGHT; y++){
                if(x == 0 || x == (meta.BOARD_WIDTH - 1)){
                    this.#field[y * meta.BOARD_WIDTH + x] = 254;                    
                }else if(y == (meta.BOARD_HEIGHT - 1)){
                    this.#field[y * meta.BOARD_WIDTH + x] = 255;                        
                }else{
                    this.#field[y * meta.BOARD_WIDTH + x] = 0;
                }
            }
        }
    }

    /**
     * INTERNAL
     * This internal method is used to verify that a point lies inside the game boundaries
     * A point is inside the boundaries if booth statements are true.
     * 1. Neither the x nor the y coordinate is negative
     * 2. Neither the x nor the y coordinate exceed the width/height of the board
     * @param {Number} x X coordinate 
     * @param {Number} y Y coordinate
     * @returns {Boolean} true if the point is inside the board
     */
    #checkBoundary(x, y){
        if(x < 0 || x >= meta.BOARD_WIDTH){
            return false;
        }else if(y < 0 || y >= meta.BOARD_HEIGHT){
            return false;
        }
        return true;
    }

    getWidth(){
        return meta.BOARD_WIDTH;
    }
    
    getHeight(){
        return meta.BOARD_HEIGHT;
    }


    /**
     * Access the element specified by the x and y coordinate.
     * If the point is not in boundaries of the board -1 will be returned.
     * @param {Number} x X Coordinate of the element
     * @param {Number} y Y Coordinate of the element
     * @returns State of the element a position (x/y) in range 0 to 9
     */
     getElementAt(x, y){
        if(!this.#checkBoundary(x, y)){
         //   return -1;
        }
        return this.#field[y * meta.BOARD_WIDTH + x];
    }

    /**
     * Sets the state of a field.
     * This operation will yield false iff the field is already occupied
     * @param {Number} x X Coordinate of the element
     * @param {Number} y Y Coordinate of the element
     * @param {Number} state Value which should be set to the field 
     * @returns True iff the field could be set
     */
    setElementAt(x, y, state){
        if(this.#field[y * meta.BOARD_WIDTH + x] != 0){
          //  return false;
        }
        this.#field[y * meta.BOARD_WIDTH + x] = state;    
        return true;
    }

    removeLine(line){
        if(line == meta.BOARD_HEIGHT){
            return;
        }
        let start = line * meta.BOARD_WIDTH;
        let end = line * meta.BOARD_WIDTH + meta.BOARD_WIDTH;
        for(let x = start + 1; x < end - 1; x++){
            if(this.#field[line * meta.BOARD_WIDTH + x] == 0){
                return;
            }
        }
        let res = this.#field.splice(start, end - start);
        for(let x = 0; x < meta.BOARD_WIDTH; x++){
            if(x == 0 || x == (meta.BOARD_WIDTH - 1)){   
                this.#field.unshift(254);
    	    }else{
                this.#field.unshift(0);
            }
        }
    }
}

export {Board}