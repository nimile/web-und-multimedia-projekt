import {Shape, ShapeHandler} from "./shapes.js"
import {Board} from "./board.js"
import meta from "./constants.js"


class Physics{
    constructor(){ }

    /**
     * Validates if the shape is allowed to rotate left.
     * This method yield true iff the shape is able to rotate left.
     * @param {Shape} shape shape which should be validated
     * @param {Board} board board object where the shape shall be validated
     * @returns true iff the shape can rotate
     */
    canShapeRotatedLeft(shape, board){
        shape.rotateLeft();
        let result = this.#INTERNAL_detectCollision(shape, board);
        shape.rotateRight();
        return result;
    }    

    /**
     * Validates if the shape is allowed to rotate right.
     * This method yield true iff the shape is able to rotate right.
     * @param {Shape} shape shape which should be validated
     * @param {Board} board board object where the shape shall be validated
     * @returns true iff the shape can rotate
     */
    canShapeRotatedRight(shape, board){ 
        shape.rotateRight();
        let result = this.#INTERNAL_detectCollision(shape, board);
        shape.rotateLeft();
        return result;
    }
    
    /**
     * Validates if the shape is allowed to move one block down.
     * This method yield true iff the shape is able to move a block.
     * @param {Shape} shape shape which should be validated
     * @param {Board} board board object where the shape shall be validated
     * @returns true iff the shape can move
     */
    canShapeMoveDown(shape, board){
        return this.#INTERNAL_detectCollision(shape, board, 0, 1);
    }
    
    /**
     * Validates if the shape is allowed to move one block to the left side.
     * This method yield true iff the shape is able move a block.
     * @param {Shape} shape shape which should be validated
     * @param {Board} board board object where the shape shall be validated
     * @returns true iff the shape can move
     */
    canShapeMoveLeft(shape, board){
        return this.#INTERNAL_detectCollision(shape, board, -1, 0);
    }
    
    /**
     * Validates if the shape is allowed to move one block to the right side.
     * This method yield true iff the shape is able move a block.
     * @param {Shape} shape shape which should be validated
     * @param {Board} board board object where the shape shall be validated
     * @returns true iff the shape can move
     */
    canShapeMoveRight(shape, board){
        return this.#INTERNAL_detectCollision(shape, board, 1, 0);
    }


    /**
     * This internal method is used to validate if a shape can move into a certain direction.
     * This method yields true iff the shape can move in this direction
     * @param {Shape} shape shape which should be validated
     * @param {Board} board board object where the shape shall be validated
     * @param {Number} offset_x X direction in which the validation occurs 
     * @param {Number} offset_y Y direction in which the validation occurs 
     * @returns true iff the shape can move in the direction specified by offset
     */
    #INTERNAL_detectCollision(shape, board, offset_x = 0, offset_y = 0){
        // Assign positions with an offset, if offset is 0 the shape is validated on its own position
        let position_x = shape.getX() + offset_x;
        let position_y = shape.getY() + offset_y;

        // To validate the shape every single block must be checked for collision
        // There a 3 steps for each block.
        // 1.
        // 2.
        // 3.

        for(let x = 0; x < meta.SHAPE_SIZE; x++){
            for(let y = 0; y < meta.SHAPE_SIZE; y++){
                // Step 1
                if ((position_x + x) >= 0 && (position_x + x) < board.getWidth()){
                    // Step 2
                    if ((position_y + y) >= 0 && (position_y + y) < board.getHeight()){                   
                        let stateAtField = board.getElementAt(position_x + x, position_y + y);
                        let stateAtShape = shape.getElementAt(x, y);
                        // Step 3
                        if(stateAtShape != 0 && stateAtField != 0){
                            return false;
                        }
                    }
                }
            }
        }
        return true;
    }

}
export{Physics};